<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myUser - myUser
 *
 * @author kkrikorian
 */
class koiLib {

    static public function getRemoteAddr() {
        return (isset($_SERVER["REMOTE_ADDR"])) ? $_SERVER["REMOTE_ADDR"] : "0.0.0.0";
    }

    static public function getIpClient() {
        $ipRemote = self::getRemoteAddr();
        return ip2long($ipRemote);
    }

    public static function cleanUpFieldnameFormat($fieldnameRaw) {
        $str = str_replace(array('[]', '][', '[', ']'), "%", $fieldnameRaw);
        if (stristr($str, "%") === FALSE) {
            return $str;
        }
        $arrgh = explode("%", $str);

        array_pop($arrgh);
        return array_pop($arrgh);
    }

    public static function is_serialized($string) {
        if (!$string) {
            return false;
        }
        if (is_array($string)) {
            return false;
        }
        return ($string === 'b:0;' || @unserialize($string) !== false) ? true : false;
    }

    public static function formatMoneda($number) {
        //setlocale(LC_MONETARY, 'es_VE');
//		return money_format('%n', $number);
        return number_format($number, 2, ",", ".");
    }

    public static function formatCantidad($numero, $incluirDecimales = true, $forceMocharDecimales = false) {
        $numFormated = number_format($numero, 2, ",", ".");
        if (!$forceMocharDecimales) {
            if (substr($numFormated, -2) != "00") {
                //no deberia mochar
                return $numFormated;
            }
        }
        return (!$incluirDecimales) ? substr($numFormated, 0, -3) : $numFormated;
    }

    public static function alerta($msg) {
        echo "<script>alert('" . $msg . "');</script>";
    }

    public static function calcularEdad($fecha) {
        list($Y, $m, $d) = explode("-", $fecha);
        return( date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y );
    }

    public static function getOrdinal($num, $refPosicion = false) {
        $r = "";
        if (strlen($num) == 1) {
            switch ($num) {
                case "1":
                $r = ($refPosicion) ? "er" : "ro";
                break;
                case "3":
                $r = ($refPosicion) ? "er" : "ro";
                break;
                case "2":
                $r = "do";
                break;
                case "7":
                $r = "mo";
                break;
                case "8":
                $r = "vo";
                break;
                case "9":
                $r = "no";
                break;
                default:
                $r = "to";
                break;
            }
        } else {
            $w = self::getOrdinal(substr($num, -1), true);
            $r = substr($num, 0, (strlen($num) - 2)) . $w;
        }
        return $num . $r;
    }

    public static function array_search_ilike($needle, $haystack) {
        foreach ($haystack as $k => $v) {
            if (stristr($v, $needle)) {
                return $k;
            }
        }
    }

    public static function debug($array = array(), $withExit = false) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        if ($withExit) {
            exit;
        }
    }

    public static function clearEmptyValues($array) {
        foreach ($array as $key => $value) {
            if (empty($value)) {
                unset($array[$key]);
            }
        }
        return $array;
    }

    public static function string2links($content){
        $content = preg_replace('$(https?://[a-z0-9_./?=&#-]+)(?![^<>]*>)$i', ' <a href="$1" target="_blank">$1</a> ', $content." ");
        $content = preg_replace('$(www\.[a-z0-9_./?=&#-]+)(?![^<>]*>)$i', '<a target="_blank" href="http://$1"  target="_blank">$1</a> ', $content." ");
        return nl2br($content);
    }

    /**
     * Generates a two chars range with step
     *
     * @param  int  $start
     * @param  int  $stop
     * @param  int  $step
     * @return array
     */
    static public function generateTwoCharsRangeWithStep($start, $stop, $step = 1, $withPad = true, $add_empty = false) {
        $results = array();
        for ($i = $start; $i <= $stop; $i = $i + $step) {
            if ($withPad) {
                $results[$i] = sprintf('%02d', $i);
            } else {
                $results[$i] = $i;
            }
        }
        if ($add_empty) {
            array_unshift($results, "");
        }
        return $results;
    }

    /**
     * Sumar dias a una fecha
     * @param date $fecha Fecha expresada en dd/mm/yyyy
     * @param int $dias Cantidad de dias, si el valor es negativo los dias se restaran
     * @return string 
     */
    public static function sumarDias($fecha, $dias) {
        $dia = substr($fecha, 0, 2);
        $mes = substr($fecha, 3, 2);
        $anio = substr($fecha, 6, 4);

        $ultimo_dia = date("d", mktime(0, 0, 0, $mes + 1, 0, $anio));
        $dias_adelanto = $dias;
        $siguiente = $dia + $dias_adelanto;
        if ($ultimo_dia < $siguiente) {
            $dia_final = $siguiente - $ultimo_dia;
            $mes++;
            if ($mes == '13') {
                $anio++;
                $mes = '01';
            }
            $fecha_final = $dia_final . '/' . $mes . '/' . $anio;
        } else {
            $fecha_final = $siguiente . '/' . $mes . '/' . $anio;
        }
        return $fecha_final;
    }

    public static function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public static function getUniqueToken($length = 10, $uc = true, $n = true, $sc = false){
        $token = "";
        $codeAlphabet = "abcdefghijklmnopqrstuvwxyz";
        if ($uc){
            $codeAlphabet .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($n){
            $codeAlphabet .= '0123456789';
        }
        if ($sc){
            $codeAlphabet .= '-_';
        }
        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[self::crypto_rand_secure(0,strlen($codeAlphabet))];
        }
        return $token;
    }

    /**
     * Generar un string aleatorio con diferentes caracteres
     * @param int $length Tamaño del string, por defecto 10
     * @param boolean $uc Incluir mayusculas, por defecto TRUE
     * @param boolean $n Incluir numeros, por defecto TRUE
     * @param boolean $sc Incluir caracteres especiales, por defecto FALSE
     * @return string $random_str 
     */
    public static function randomString($length = 10, $uc = true, $n = true, $sc = false) {
        $source = 'abcdefghijklmnopqrstuvwxyz';
        if ($uc)
            $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($n)
            $source .= '1234567890';
        if ($sc)
            $source .= '|@#~$%()=^*+[]{}-_';
        if ($length > 0) {
            $random_str = "";
            $source = str_split($source, 1);
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, count($source));
                $random_str .= $source[$num - 1];
            }
        }
        return $random_str;
    }

    static public function getFileTypes($filename) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // devuelve el tipo mime de su extensión
        $mime = finfo_file($finfo, $filename);
        finfo_close($finfo);
        return $mime;
    }

    public static function convertFileSize($sizeName) {
        $filesizename = array("Bytes" => 0, "KB" => 1, "MB" => 2, "GB" => 3, "TB" => 4, "PB" => 5, "EB" => 6, "ZB" => 7, "YB" => 8);
        $filesizenameReverse = array_flip($filesizename);
        $size = $filesizename[$sizeName];
        return $size ? round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizenameReverse[$i] : '0 Bytes';
    }

    /**
     * rst2Array
     * @param <DoctrineRecordSet> $rst Doctrine Recordset Execute()
     * @param <String> $key Namefield of key
     * @param <String> $value Namefield of value
     */
    public static function rst2Array($rst, $key, $value) {
        $arrgh = array();
        foreach ($rst as $r) {
            if (is_null($key)) {
                array_push($arrgh, $r->get($value));
            } else {
                $arrgh[strtolower($r->get($key))] = $r->get($value);
            }
        }
        return $arrgh;
    }

    public static function is_array_associative($arr) {
        return (is_array($arr) && count(array_filter(array_keys($arr), 'is_string')) == count($arr));
    }

    public static function ordenarArray($array) {
        (self::is_array_associative($array)) ? asort($array, SORT_REGULAR) : sort($array, SORT_REGULAR);
        return $array;
    }

    /**
     * Esta función elimina el elemento que queramos en un array de una dimensión.
     * @param <type> $array         el array en el que queremos eliminar se le pasa por valor.
     * @param <type> $deleteIt      el valor que queremos eliminar
     * @param <type> $preserveOldKeys    si el valor es false la funcion re hará el índice (desde 0, 1, …) si es true: la función conservará el antiguo índice
     * @return <boolean>            Devuelve verdadero si se encontró el valor, sino falso
     */
    public static function deleteFromArray(&$array, $deleteIt, $preserveOldKeys = FALSE) {
        $key = array_search($deleteIt, $array, TRUE);
        if ($key === FALSE)
            return FALSE;
        unset($array[$key]);
        if (!$preserveOldKeys)
            $array = array_values($array);
        return TRUE;
    }

    public static function isKeyInArray($array, $key2Find) {
        //$flip = array_flip($array);
        $flip = $array;
        return isset($flip[$key2Find]);
    }

    /**
     * Esta función elimina el elemento que queramos en un array de una dimensión.
     * @param <type> $array         el array en el que queremos eliminar se le pasa por valor.
     * @param <type> $deleteIt      el valor que queremos eliminar
     * @param <type> $preserveOldKeys    si el valor es false la funcion re hará el índice (desde 0, 1, …) si es true: la función conservará el antiguo índice
     * @return <boolean>            Devuelve verdadero si se encontró el valor, sino falso
     */
    public static function deleteFromArrayByKey(&$array, $keyToDelete, $preserveOldKeys = FALSE) {
        if ($keyToDelete === FALSE)
            return FALSE;
        unset($array[$keyToDelete]);
        if (!$preserveOldKeys)
            $array = array_values($array);
        return TRUE;
    }

    public static function toArray($array) {
        $trray = array();
        foreach ($array as $k => $v) {
            $trray[$k] = $v;
        }
        return $trray;
    }

    static public function setBulkCulture($formClass) {
        $formClass->embedI18n(array('es', 'en'));
        $formClass->widgetSchema->setLabel('es', 'Español');
        $formClass->widgetSchema->setLabel('en', 'English');
    }

    /**
     * Verifico si la credencial actual tiene permisos para ejecutar una accion determinada
     * si eres admin entonces PASA directo, sino Entonces Si Fue escrito por Admin enotnces NO,
     * Si finalmente No eres Admin y Tu eres el dueño entonces PASA
     * @param <type> $currentCredential
     * @param <type> $wasByAdmin
     * @return <type>
     */
    static public function credentialActions($currentCredential, $wasByAdmin) {
        if ($currentCredential) {
            return true;
        } else {
            if ($wasByAdmin) {
                return false;
            } else {
                return true;
            }
        }
    }

    static public function sfFormUpdateFields($form, $fields, $preserveFields = true) {
        foreach ($form as $key => $value) {
            if ($preserveFields) {
                //Filtro normal busco los indices indicados y borro los que no estan
                //DEJO SOLO LOS FIELDS
                if (!in_array($key, $fields)) {
                    unset($form[$key]);
                }
            } else {
                //Filtro inverso busco los indices que no sean los indicados y borro el resto
                //DEJO SOLO LOS QUE NO ESTAN EN FIELDS
                if (in_array($key, $fields)) {
                    unset($form[$key]);
                }
            }
        }
        return $form;
    }

    static public function objectToArray($object) {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map('self::objectToArray', $object);
    }

    static public function printAsJSON($action, $output = array()) {
        $action->getResponse()->setContentType('application/json');
        return $action->renderText(json_encode($output));
    }
    
    static public function filtrarMatriz($collection = array(), $indices = array(), $filtroInverso = false) {
        if (!is_array($indices)) {
            $indices = array($indices);
        }
        if(!is_array($collection)){
            $collection = self::objectToArray($collection);
        }
        
        $r = array();

        foreach ($collection as $c) {
            foreach ($c as $key => $value) {
                if (!$filtroInverso) {
                    //Filtro normal busco los indices indicados y borro los que no estan
                    if (!in_array($key, $indices)) {
                        unset($c[$key]);
                    }
                } else {
                    //Filtro inverso busco los indices que no sean los indicados y borro el resto
                    if (in_array($key, $indices)) {
                        unset($c[$key]);
                    }
                }
            }
            $r[] = $c;
        }
        return $r;
    }

    static public function filtrarDoctrineCollectionArray($collection, $fieldsBuscados = array()) {
        $array = array();
        $arrayInternal = array();

        foreach ($collection as $c) {
            foreach ($fieldsBuscados as $f) {
                $arrayInternal[] = $c->get($f);
            }
            $array[] = $arrayInternal;
            unset($arrayInternal);
        }

        return $array;
    }

    static public function filtrarDoctrineCollection($collection, $valorBuscado) {
        $array = array();

        if (is_array($valorBuscado)) {
            return self::filtrarDoctrineCollectionArray($collection, $valorBuscado);
        }

        foreach ($collection as $c) {
            $array[] = $c->get($valorBuscado);
        }
        return $array;
    }

    static public function getMonthDays($Month, $Year) {
        //Obtenemos la cantidad de días que tiene septiembre del 2008
        //echo getMonthDays(9, 2008);
        return date("t", mktime(0, 0, 0, $Month, 1, $Year));
    }

    public static function cleanInput($data) {
        // http://svn.bitflux.ch/repos/public/popoon/trunk/classes/externalinput.php
        // +----------------------------------------------------------------------+
        // | Copyright (c) 2001-2006 Bitflux GmbH                                 |
        // +----------------------------------------------------------------------+
        // | Licensed under the Apache License, Version 2.0 (the "License");      |
        // | you may not use this file except in compliance with the License.     |
        // | You may obtain a copy of the License at                              |
        // | http://www.apache.org/licenses/LICENSE-2.0                           |
        // | Unless required by applicable law or agreed to in writing, software  |
        // | distributed under the License is distributed on an "AS IS" BASIS,    |
        // | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or      |
        // | implied. See the License for the specific language governing         |
        // | permissions and limitations under the License.                       |
        // +----------------------------------------------------------------------+
        // | Author: Christian Stocker <chregu@bitflux.ch>                        |
        // +----------------------------------------------------------------------+
        //
        // Kohana Modifications:
        // * Changed double quotes to single quotes, changed indenting and spacing
        // * Removed magic_quotes stuff
        // * Increased regex readability:
        //   * Used delimeters that aren't found in the pattern
        //   * Removed all unneeded escapes
        //   * Deleted U modifiers and swapped greediness where needed
        // * Increased regex speed:
        //   * Made capturing parentheses non-capturing where possible
        //   * Removed parentheses where possible
        //   * Split up alternation alternatives
        //   * Made some quantifiers possessive
        // Fix &entity\n;
        $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
                $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

        // Remove namespaced elements (we do not need them)
                $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

                do {
            // Remove really unwanted tags
                    $old_data = $data;
                    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
                } while ($old_data !== $data);

                return $data;
            }

            static public function getAbecedario($includeNtilde = false, $includeNumeral = false) {
                $abc = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n");
                $nTilde = array("ñ");
                $numChar = array("#");
                $opq = array("o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

                $abecedario = ($includeNumeral) ? array_merge($numChar, $abc) : $abc;
                $abecedario = ($includeNtilde) ? array_merge($abecedario, $nTilde) : $abecedario;
                return array_merge($abecedario, $opq);
            }

            static public function slugify($text) {
        /*
         * OLD SLUG       
          // replace all non letters or digits by -
          $text = preg_replace('/\W+/', '-', $text);

          // trim and lowercase
          $text = strtolower(trim($text, '-'));

          return $text;
         * 
         */

        // replace non letter or digits by -
          $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
          $text = trim($text, '-');
        // transliterate
          if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    /*
      public static function koipanelFilters(Doctrine_Query $q, sfUser $sf_user) {
      $koiFilters = $sf_user->getAttribute("koipanel.filters", 0, "koipanel_modules");
      //koiLib::debug($koiFilters, true);
      $fields = array();
      $values = array();
      foreach ($koiFilters as $key => $value) {
      array_push($fields, $key . " = ?");
      array_push($values, $value);
      }
      $q->where(implode(" AND ", $fields), $values);
      return $q;
      }
     */

      public static function generateUniqueString() {
        return md5(rand(), time());
    }

    public static function getLuceneIndex($model) {
        ProjectConfiguration::registerZend();

        if (file_exists($index = self::getLuceneIndexFile($model))) {
            return Zend_Search_Lucene::open($index);
        } else {
            return Zend_Search_Lucene::create($index);
        }
    }

    public static function getLuceneIndexFile($model) {
        return sfConfig::get('sf_data_dir') . '/' . $model . '.' . sfConfig::get('sf_environment') . '.index';
    }

    public static function rrmdir($directory, $empty = FALSE) {
        if (substr($directory, -1) == '/') {
            $directory = substr($directory, 0, -1);
        }
        if (!file_exists($directory) || !is_dir($directory)) {
            return FALSE;
        } elseif (is_readable($directory)) {
            $handle = opendir($directory);
            while (FALSE !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    $path = $directory . '/' . $item;
                    if (is_dir($path)) {
                        self::rrmdir($path);
                    } else {
                        unlink($path);
                    }
                }
            }
            closedir($handle);
            if ($empty == FALSE) {
                if (!rmdir($directory)) {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

}

?>
