<?php
if(!isset($_SESSION['already_visited']
{
  $_SESSION['already_visited'] = true;
  $nbvisiteurs = get_file_contents('nbvisiteurs.txt');
  $handle = fopen('nbvisiteurs.txt', 'w');
  fwrite($handle, $nbvisiteurs++);
  fclose($handle);
}
?>