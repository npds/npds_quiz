<?php
/************************************************************************/
/* NPDS V : Net Portal Dynamic System .                                 */
/* ====================================                                 */
/*                                                                      */
/* This version name NPDS Copyright (c) 2001-2024 by Philippe Brunier   */
/*                                                                      */
/* E-learning services Copyright (c) 2003 by Alatourrette - AxéCité     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

function quiz_adm_translate($phrase) {
  return (htmlentities($phrase,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>