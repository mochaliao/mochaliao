<?php

class ResizeImage {

    protected $CI;

    public function __construct()
    {
    // Assign the CodeIgniter super-object
    $this->CI =& get_instance();
    }


    var $image;
    var $image_type_id;
    public function load($filename) {
        //取得圖片資訊
        $image_info = getimagesize($filename);
        //取得圖片類型
        $this -> image_type_id = $image_info[2];
        //判斷圖片類型，並建立圖片物件
        if( $this -> image_type_id == IMAGETYPE_JPEG ) {
            $this -> image = imagecreatefromjpeg($filename);
        }
        elseif( $this -> image_type_id == IMAGETYPE_GIF ) {
            $this -> image = imagecreatefromgif($filename);
        }
        elseif( $this -> image_type_id == IMAGETYPE_PNG )
        {
            $this -> image = imagecreatefrompng($filename);
        }
    }

    public function save($filename, $image_type_id = IMAGETYPE_JPEG) {
        if( $image_type_id == IMAGETYPE_JPEG ) {
            imagejpeg($this -> image,$filename,75);
        }
        elseif( $image_type_id == IMAGETYPE_GIF ) {
            imagegif($this -> image,$filename);
        }
        elseif( $image_type_id == IMAGETYPE_PNG ) {
            imagepng($this -> image,$filename);
        }
        //修改權限
        chmod($filename,0755);
    }

    public function getWidth() {
        //取得寬度
        return imagesx($this -> image);
    }
    public function getHeight() {
        //取得高度
        return imagesy($this -> image);
    }
    public function resizeToHeight($height) {
        //高度縮放(寬度等比縮放)
        $ratio = $height / $this -> getHeight();
        $width = $this -> getWidth() * $ratio;
        $this->resize($width,$height);
    }

    public function resizeToWidth($width) {
        //寬度縮放(高度等比縮放)
        $ratio = $width / $this -> getWidth();
        $height = $this -> getheight() * $ratio;
        $this->resize($width,$height);
    }

    public function resizeToFit($width, $height){
        $source_width = $this -> getWidth();
        $source_height = $this -> getHeight();

        // 橫圖
        if($source_width > $source_height){
            $this -> resizeToWidth($width);
        }
        // 直圖(或正方形)
        else{
            $this -> resizeToHeight($height);
        }
    }

    public function scale($scale) {
        //百分比縮放
        $width = $this -> getWidth() * $scale/100;
        $height = $this -> getheight() * $scale/100;
        $this->resize($width,$height);
    }

    public function resize($width,$height) {
        //imagecreatetruecolor會產生特定長寬的黑色圖形，並建立圖片物件
        $new_image = imagecreatetruecolor($width, $height);
        //利用imagecopyresampled resize圖片
        //imagecopyresampled(目地圖片,來源圖片,目地x座標,目地y座標,來源x座標,來源y座標,目地寬度,目地高度,來源寬度,來源高度)
        imagecopyresampled($new_image, $this -> image, 0, 0, 0, 0, $width, $height, $this -> getWidth(), $this -> getHeight());
        //將image變數指向新的圖片
        $this -> image = $new_image;
    }
}

// $filePath = 
// $image = new ResizeImage();
// $image -> load("45_picture_20180308114735_5aa0b257bc7ff.jpg");

// $image -> scale(70);
// $image -> save("/resize/45_picture_20180308114735_5aa0b257bc7ff.jpg");
//修改高度
//$image->resizeToHeight(500);
//$image->save('pic2.jpg');



