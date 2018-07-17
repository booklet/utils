<?php
// Generator kodów — losowych ciągów z predefiniowanych znaków
// zazwyczaj dla kodów używanych w kodach promocyjnych

class CodeGenerator
{
    const UPPERCASE = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
    const LOWERCASE = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
    const NUMBERS = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    const SYMBOLS = ['`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '[', ']', '{', '}', '"', "'", ';', ':', '<', '>', ',', '.', '?'];
    const HARD_TO_READ_CHARACTERS = ['i', 'I', 'l', 'o', 'O', 'q', '0'];
    // Do not change default values!
    const DEF_LENGHT = 8;
    const DEF_PREFIX = '';
    const DEF_SUFFIX = '';
    const DEF_NUMBERS = true;
    const DEF_LETTERS = true;
    const DEF_SYMBOLS = false;
    const DEF_LOWER_AND_UPPERCASE = false;
    const DEF_REMOVE_PROBLEMATIC_CHARACTERS = true;

    private $lenght;
    private $prefix;
    private $suffix;
    private $numbers;
    private $letters;
    private $symbols;
    private $lower_and_uppercase;
    private $remove_problematic_characters;
    private $characters;

    public function __construct(array $params = [])
    {
        $this->lenght = $params['lenght'] ?? self::DEF_LENGHT;
        $this->prefix = $params['prefix'] ?? self::DEF_PREFIX;
        $this->suffix = $params['suffix'] ?? self::DEF_SUFFIX;
        $this->numbers = $params['numbers'] ?? self::DEF_NUMBERS;
        $this->letters = $params['letters'] ?? self::DEF_LETTERS;
        $this->symbols = $params['symbols'] ?? self::DEF_SYMBOLS;
        $this->lower_and_uppercase = $params['lower_and_uppercase'] ?? self::DEF_LOWER_AND_UPPERCASE;
        $this->remove_hard_to_read_characters = $params['remove_hard_to_read_characters'] ?? self::DEF_REMOVE_PROBLEMATIC_CHARACTERS;

        $this->prepareCharacters();
    }

    public function generate()
    {
        do {
            $code = $this->generateCode();
        } while ($this->hasContainVulgarism($code));

        return $code;
    }

    public function generateMultiple(int $quantity)
    {
        $codes = [];
        for ($i = 0; $i < $quantity; ++$i) {
            $codes[] = $this->generate();
        }

        return $codes;
    }

    private function prepareCharacters()
    {
        $this->characters = [];

        if ($this->numbers) {
            $this->characters = array_merge($this->characters, self::NUMBERS);
        }

        if ($this->letters) {
            $this->characters = array_merge($this->characters, self::LOWERCASE);

            if ($this->lower_and_uppercase) {
                $this->characters = array_merge($this->characters, self::LOWERCASE, self::UPPERCASE);
            }
        }

        if ($this->symbols) {
            $this->characters = array_merge($this->characters, self::SYMBOLS);
        }

        if ($this->remove_hard_to_read_characters) {
            $this->characters = array_values(array_diff($this->characters, self::HARD_TO_READ_CHARACTERS));
        }
    }

    private function generateCode()
    {
        $code = '';
        for ($i = 0; $i < $this->lenght; ++$i) {
            $code .= $this->characters[mt_rand(0, count($this->characters) - 1)];
        }

        return $this->prefix . $code . $this->suffix;
    }

    private function hasContainVulgarism($code)
    {
        foreach (VulgarDictionary::POLISH_VULGARITY as $vulgarity) {
            if (StringUntils::isInclude($code, $vulgarity)) {
                return true;
            }
        }

        return false;
    }
}
