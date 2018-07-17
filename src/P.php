<?php
class P
{
    public static function printToFile($variable, string $path)
    {
        $var_str = var_export($variable, true);
        $var = "<?php\n\$variable = $var_str;";
        file_put_contents($path, $var);
    }
}
