<?php
/**
 * Name:    Contacts
 * Author:  Pedro Ruiz Hidalgo
 *           correo@pedroruizhidalgo.es
 *           @pedroruizhidalg
 *
 *
 * Created:  2018-01-31
 * 
 * Description:  This is the configuration file for the third_party contacts project
 *
 *
 * Requirements: PHP5 or above
 *
 * @package    Contacts
 * @author     Pedro Ruiz hidalgo
 * @link       http://github.com/PedroRuiz/contacts
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| List dateformat.
| -------------------------------------------------------------------------
| Formats supported by php's date().
*/
$config['cntcts_dateformat'] = 'd-m-Y h:i:s';

/*
| -------------------------------------------------------------------------
| Table Name
| -------------------------------------------------------------------------
| 
*/
$config['cntcts_tablename'] = 'contacts';

/*
| -------------------------------------------------------------------------
| Images folder name
| -------------------------------------------------------------------------
| 
*/
$config['cntcts_images'] = 'assets/img/contacts/';


/*
| -------------------------------------------------------------------------
| Name of fieds in view
| -------------------------------------------------------------------------
| 
*/
$config['cntcts_names'] = array(
    'date_creation' =>  'Fecha alta',
    'first_name'    =>  'Nombre',
    'last_name'     =>  'Apellidos',
    'shown_name'    =>  'Mostrado',
    'nick_name'     =>  'Apodo',
    'first_email'   =>  'Correo electrónico',
    'second_email'  =>  'Correo electrónico edicional',
    'chat_nick'     =>  'Nombre en el chat',
    'mobile'        =>  'Móvil',
    'work_phone'    =>  'Teléfono trabajo',
    'home_phone'    =>  'Teléfono casa',
    'fax'           =>  'Fax',
    'pager'         =>  'Buscapersonas',
    'image'         =>  'Imágen'
);

