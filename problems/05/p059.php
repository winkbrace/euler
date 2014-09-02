<?php
/**
 * XOR decryption
 *
 * Each character on a computer is assigned a unique code and the preferred standard is ASCII (American Standard
 * Code for Information Interchange). For example, uppercase A = 65, asterisk (*) = 42, and lowercase k = 107.
 *
 * A modern encryption method is to take a text file, convert the bytes to ASCII, then XOR each byte with a
 * given value, taken from a secret key. The advantage with the XOR function is that using the same encryption
 * key on the cipher text, restores the plain text; for example, 65 XOR 42 = 107, then 107 XOR 42 = 65.
 *
 * For unbreakable encryption, the key is the same length as the plain text message, and the key is made up of
 * random bytes. The user would keep the encrypted message and the encryption key in different locations, and
 * without both "halves", it is impossible to decrypt the message.
 *
 * Unfortunately, this method is impractical for most users, so the modified method is to use a password as a
 * key. If the password is shorter than the message, which is likely, the key is repeated cyclically throughout
 * the message. The balance for this method is using a sufficiently long password key for security, but short
 * enough to be memorable.
 *
 * Your task has been made easy, as the encryption key consists of three lower case characters. Using
 * p059_cipher.txt, a file containing the encrypted ASCII codes, and the knowledge that the plain text must
 * contain common English words, decrypt the message and find the sum of the ASCII intValues in the original text.
 *
 * The solution is: 107359
 */
$log = new \Util\Log();

$text = trim(file_get_contents(RESOURCES_PATH . 'p059_cipher.txt'));
//echo $text; die;
$chars = explode(',', $text);

// lowercase chars is 97 - 122
//for ($i=0; $i<=255; $i++)
//    $log->log($i.': '.chr($i));
//die;

$solutions = [];
for ($a=97; $a<=122; $a++)
{
    for ($b=97; $b<=122; $b++)
    {
        for ($c=97; $c<=122; $c++)
        {
            $keys = [$a, $b, $c];
            $decryptedText = '';
            $sumAsciiValues = 0;
            foreach ($chars as $i => $char)
            {
                $char = gmp_init($char);
                $key = gmp_init($keys[$i % 3]);
                $decryptedChar = gmp_strval(gmp_xor($char, $key));
                // sanity check: the character has to be within the normal range
                if ($decryptedChar > 122 || $decryptedChar < 32) {
                    //$log->log(implode(',', $result));
                    continue 2;
                }
                $decryptedText .= chr($decryptedChar); // add ansi character to result
                $sumAsciiValues += (int) $decryptedChar;
            }
            // if we got here, all characters have been in valid range so it is a possible solution
            $solutions[implode(',', $keys)] = ['text' => $decryptedText, 'sum' => $sumAsciiValues];
        }
    }
}

foreach ($solutions as $keys => $sol)
{
    $log->log($keys);
    $log->log($sol['text']);
}

// of the 6 possible decryptions, the last one is text. From the bible.
// a=103, b=111, c=100
$log->log(chr(103).chr(111).chr(100));  // = god
$log->solution($solutions['103,111,100']['sum']);