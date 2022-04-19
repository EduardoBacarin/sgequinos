<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Funcoes_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if ( ! function_exists('converte_resenha_base64')){
  function converte_resenha_base64($data, $nome_imagem){
      if (preg_match('/^data:image\/octet-stream;base64,/', $data, $type)) {
          $data = substr($data, strpos($data, ',') + 1);
          $type = 'png'; // jpg, png, gif

          if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
              throw new \Exception('invalid image type');
          }
          $data = str_replace( ' ', '+', $data );
          $data = base64_decode($data);

          if ($data === false) {
              throw new \Exception('base64_decode failed');
          }
      } else {
          throw new \Exception('did not match data URI with image data');
      }

      if(!is_dir('assets/resenhas/')){
          mkdir('assets/resenhas/');
      }

      file_put_contents('assets/resenhas/'.$nome_imagem.'_' .  time() . '.'.$type, $data);
      return 'assets/resenhas/'.$nome_imagem.'_' .  time() . '.'.$type;
  }
}

// ------------------------------------------------------------------------

/* End of file Funcoes_helper.php */
/* Location: ./application/helpers/Funcoes_helper.php */