
<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 *
 * @package local
 * @subpackage tics331
 * @copyright 2012-onwards Jorge Villalon <jorge.villalon@uai.cl>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Minimum for Moodle to work, the basic libraries
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
// Page navigation and URL settings.
$PAGE->set_url(new moodle_url('/local/tics331', array('filter'=>$name)));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title('Pauta');
// Show the page header
echo $OUTPUT->header();
?>
<html>
    <head>
        <meta charset='UTF-8'>
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <td>titulo</td>
                <td> </td>
                <td>descripcion</td>
                <td></td>
                <td>nombre</td>
            </tr>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = 'select*from tbl_documentos';
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            
            <tr>
                <td><?php echo $datos['titulo']; ?></td>
                <td></td>
                <td><?php echo $datos['descripcion']; ?></td>
                <td></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
            </tr>
                
          <?php  } ?>
            
        </table>
    </body>
</html>
<?php 
// Show the page footer
echo $OUTPUT->footer();
?>