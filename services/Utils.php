<?php

/**
 * Util classes : static methods usable without instanciation.
 * Example : Utils::redirect('home'); 
 */
class Utils {
    /**
     * Convert a date in French format : "Samedi 15 juillet 2023".
     * @param DateTime $date : date to format.
     * @return string : date formated.
     */
    public static function convertDateToFrenchFormat(DateTime $date) : string
    {
        // Attention, s'il y a un soucis lié à IntlDateFormatter c'est qu'il faut
        // activer l'extention intl_date_formater (ou intl) au niveau du serveur apache. 
        // Ca peut se faire depuis php.ini ou parfois directement depuis votre utilitaire (wamp/mamp/xamp)
        $dateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $dateFormatter->setPattern('EEEE d MMMM Y');
        return $dateFormatter->format($date);
    }

    /**
     * Redirect to URL.
     * @param string $action : ordered action (router).
     * @param array $params : Facultative, params of the action ['param1' => 'valeur1', 'param2' => 'valeur2']
     * @return void
     */
    public static function redirect(string $action, array $params = []) : void
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }

    /**
     * Return js code to insert as an attribute of a button to open de popup "confirm"
     * @param string $message :
     * @return string : js code to insert in the button.
     */
    public static function askConfirmation(string $message) : string
    {
        return "onclick=\"return confirm('$message');\"";
    }

    /**
     * Protects a string from XSS attacks.
     * Line return are changed in <p> for a better display. 
     * @param string $string : string to protect.
     * @return string : protected string.
     */
    public static function format(string $string) : string
    {
        // Step 1, protect the text with htmlspecialchars.
        $finalString = htmlspecialchars($string, ENT_QUOTES);

        // Step 2, cut the text at each line return, 
        $lines = explode("\n", $finalString);

        // Rebuild the text, one line per paragraph (ignores empty lines).
        $finalString = "";
        foreach ($lines as $line) {
            if (trim($line) != "") {
                $finalString .= "<p>$line</p>";
            }
        }
        
        return $finalString;
    }

    /**
     * Get values of the superglobal $_REQUEST.
     * If variable not defined, null return by default
     * @param string $variableName : 
     * @param mixed $defaultValue :
     * @return mixed : the value of the variable or the default value.
     */
    public static function request(string $variableName, mixed $defaultValue = null) : mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

}