<?php
class CSVUntils
{
    public static function parseCsvToArray(string $file_path, array $options = [])
    {
        $delimiter = $options['delimiter'] ?? self::getFileDelimiter($file_path);

        // $array = array_map("str_getcsv($delimiter)", file($file_path));
        // return $delimiter;

        $array = array_map(function ($v) use ($delimiter) {
            return str_getcsv($v, (string) $delimiter);
        }, file($file_path));

        // Header
        if (isset($options['remove_header']) and $options['remove_header'] == true) {
            $header = array_shift($array);
        }

        return $array;
    }

    public static function getFileDelimiter(string $file, $checkLines = 2)
    {
        $file = new SplFileObject($file);
        $delimiters = [
            ',',
            "\t",
            ';',
            '|',
            ':',
        ];

        $results = [];
        $i = 0;
        while ($file->valid() && $i <= $checkLines) {
            $line = $file->fgets();
            foreach ($delimiters as $delimiter) {
                $regExp = '/[' . $delimiter . ']/';
                $fields = preg_split($regExp, $line);
                if (count($fields) > 1) {
                    if (!empty($results[$delimiter])) {
                        ++$results[$delimiter];
                    } else {
                        $results[$delimiter] = 1;
                    }
                }
            }
            ++$i;
        }
        $results = array_keys($results, max($results));

        return $results[0];
    }
}
