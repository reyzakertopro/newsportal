<?php

class Upload {
  public static function uploadGambar( $targetFile, $file= []  ) {
    if( $file['error']== 0 ) {
      move_uploaded_file($file['tmp_name'], 'public/uploads/'. $targetFile);

    }

  }

}
