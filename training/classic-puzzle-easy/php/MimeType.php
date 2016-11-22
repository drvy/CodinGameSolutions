<?php
/**
 * MIME types are used in numerous internet protocols to associate a media type 
 * (html, image, video ...) with the content sent. The MIME type is generally 
 * inferred from the extension of the file to be sent. You have to write a 
 * program that makes it possible to detect the MIME type  of a file based on 
 * its name.
 * 
 * You are provided with a table which associates MIME types to file extensions. 
 * You are also given a list of names of files to be transferred and for each 
 * one of these files, you must find the MIME type to be used. The extension of 
 * a file is defined as the substring which follows the last occurrence, if any, 
 * of the dot character within the file name.
 * 
 * If the extension for a given file can be found in the association table 
 * (case insensitive, e.g. TXT is treated the same way as txt), then print the 
 * corresponding MIME type. If it is not possible to find the MIME type 
 * corresponding to a file, or if the file doesn’t have an extension, print 
 * UNKNOWN.
 * 
 * Input:
 * Line 1: Number N of elements which make up the association table.
 * 
 * Line 2: Number Q of file names to be analyzed.N following lines: 
 * One file extension per line and the corresponding MIME type 
 * (separated by a blank space).
 * 
 * Q following lines: One file name per line.
 * 
 * Output:
 * For each of the Q filenames, display on a line the corresponding MIME type. 
 * If there is no corresponding type, then display UNKNOWN.
 * 
 * Constraints
 * 0 < N < 10000 
 * 0 < Q < 10000
 * File extensions are composed of a maximum of 10 alphanumerical ASCII.
 * MIME types are composed of a maximum 50 alphanumerical and punctuation ASCII.
 * File names are composed of a maximum of 256 alphanumerical ASCII and dots (.)
 * There are no spaces in the file names, extensions or MIME types.
 * 
 * https://www.codingame.com/training/easy/mime-type
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%d", $n); // Number of elements which make up the association table.
fscanf(STDIN, "%d", $q); // Number Q of file names to be analyzed.

$mimeArray = array(); // array to contain all mime types and association.

/**
 * Outputs the content following the last dot of the string provided.
 * Essentially in this case it's just a extension finder.
 * @param      string  $str    String (or filename in this case)
 * @return     string  The extension.
 */
function getExtension($str){
    $output = explode('.', $str);
    return (count($output) < 2 ? false : strtolower(end($output)));
}

// Get all mime-types and store them into an array.
for ($i = 0; $i < $n; ++$i){
    fscanf(STDIN, "%s %s", $extension, $mimetype);
    $mimeArray[$mimetype][] = strtolower($extension);
}

// Get all filenames and process.
for ($i = 0; $i < $q; ++$i){
    $filename = stream_get_line(STDIN, 500 + 1, "\n"); // One file name per line.
    $extension = getExtension($filename); // Get extension of file.
    $mimeType = 'UNKNOWN'; // By default, the mimeType is unknown.
    
    foreach($mimeArray as $mime=>$extensions){
        
        if(in_array($extension, $extensions)){
            $mimeType = $mime;
            break;
        }
        
    }
    
    echo $mimeType, "\n";
}