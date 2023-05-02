<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $table = 'tbl_lampiran';
    protected $fillable = ['type', 'url', 'thumb', 'arsip_id', 'admin_id'];
    
    public function getSizeAttribute()
    {
        try {
            if($this->width && $this->height) {
                return [$this->width, $this->height];
            }
            
            $url = 'https://mahameru.wonosobokab.go.id'.$this->url;
            if($this->type == 'image/png') {
                return $this->getPngSize($url);
            } else if($this->type == 'image/jpeg' || $this->type == 'image/jpg') {
                return $this->getJpegSize($url);
            }
        } catch(\Exception $e) {
            return [0, 0];
        }
    }
    
    public function getIsExistAttribute()
    {
        $url = 'https://mahameru.wonosobokab.go.id'.$this->url;
        $headers = @get_headers($url);
        
        return ($headers && strpos($headers[0], '200') !== false);
    }
    
    public function getJpegSize($url)
    {
        try {
            $handle = fopen($url, "rb") or die("Invalid file stream.");
            $new_block = NULL;
            if(!feof($handle)) {
                $new_block = fread($handle, 32);
                $i = 0;
                if($new_block[$i]=="\xFF" && $new_block[$i+1]=="\xD8" && $new_block[$i+2]=="\xFF" && $new_block[$i+3]=="\xE0") {
                    $i += 4;
                    if($new_block[$i+2]=="\x4A" && $new_block[$i+3]=="\x46" && $new_block[$i+4]=="\x49" && $new_block[$i+5]=="\x46" && $new_block[$i+6]=="\x00") {
                        // Read block size and skip ahead to begin cycling through blocks in search of SOF marker
                        $block_size = unpack("H*", $new_block[$i] . $new_block[$i+1]);
                        $block_size = hexdec($block_size[1]);
                        while(!feof($handle)) {
                            $i += $block_size;
                            $new_block .= fread($handle, $block_size);
                            if($new_block[$i]=="\xFF") {
                                // New block detected, check for SOF marker
                                $sof_marker = array("\xC0", "\xC1", "\xC2", "\xC3", "\xC5", "\xC6", "\xC7", "\xC8", "\xC9", "\xCA", "\xCB", "\xCD", "\xCE", "\xCF");
                                if(in_array($new_block[$i+1], $sof_marker)) {
                                    // SOF marker detected. Width and height information is contained in bytes 4-7 after this byte.
                                    $size_data = $new_block[$i+2] . $new_block[$i+3] . $new_block[$i+4] . $new_block[$i+5] . $new_block[$i+6] . $new_block[$i+7] . $new_block[$i+8];
                                    $unpacked = unpack("H*", $size_data);
                                    $unpacked = $unpacked[1];
                                    $height = hexdec($unpacked[6] . $unpacked[7] . $unpacked[8] . $unpacked[9]);
                                    $width = hexdec($unpacked[10] . $unpacked[11] . $unpacked[12] . $unpacked[13]);
                                    return array($width, $height);
                                } else {
                                    // Skip block marker and read block size
                                    $i += 2;
                                    $block_size = unpack("H*", $new_block[$i] . $new_block[$i+1]);
                                    $block_size = hexdec($block_size[1]);
                                }
                            } else {
                                return [0, 0];
                            }
                        }
                    }
                }
            }
            return [0, 0];
        } catch(\Exception $e) {
            return [0, 0];
        }
    }
    
    function getpngsize( $url ) {
        $handle = fopen( $url, "rb" ) or die( "Invalid file stream." );
    
        if ( ! feof( $handle ) ) {
            $new_block = fread( $handle, 24 );
            if ( $new_block[0] == "\x89" &&
                $new_block[1] == "\x50" &&
                $new_block[2] == "\x4E" &&
                $new_block[3] == "\x47" &&
                $new_block[4] == "\x0D" &&
                $new_block[5] == "\x0A" &&
                $new_block[6] == "\x1A" &&
                $new_block[7] == "\x0A" ) {
                    if ( $new_block[12] . $new_block[13] . $new_block[14] . $new_block[15] === "\x49\x48\x44\x52" ) {
                        $width  = unpack( 'H*', $new_block[16] . $new_block[17] . $new_block[18] . $new_block[19] );
                        $width  = hexdec( $width[1] );
                        $height = unpack( 'H*', $new_block[20] . $new_block[21] . $new_block[22] . $new_block[23] );
                        $height  = hexdec( $height[1] );
    
                        return array( $width, $height );
                    }
                }
            }
    
        return [0, 0];
    }
}
