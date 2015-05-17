<?
if(!isset($_SESSION)){
    session_start();
}

require_once("include/Ciudad.php");

$oCiudad = new Ciudad();

$departamentosList = $oCiudad->getDepartamentos();

?>
<script src="js/map.js"></script>
<div id="form_container">
    <form id="proyectoForm" action="proyectoInsertAction.php" method="POST">
        <div style="margin-top: 20px; font-size: 17px;">Do you have in mind a new project who can help others? Tell it to Help Buddies:</div>
        <div id="label_about">About the Project:</div>
        <input type="text" name="title" id="title" minlenght="3" required placeholder="Title" />
        <textarea name="descripcion" id="descripcion" cols="40" rows="3" placeholder="Describe the project"></textarea>
        <div id="label_where">Where will be?:</div>
        <select name="id_departamento" id="id_departamento" onChange="getCiudades();">
            <option value="-1" selected> -- SELECT STATE --</option>
            <? for ($i=0; $i<count($departamentosList); $i++){
                if($departamentosList[$i]['id_departamento']==$id_departamento){ ?>
                    <option value="<?=$departamentosList[$i]['id_departamento'];?>" selected><?=ucfirst($departamentosList[$i]['nombre_departamento']); ?></option>
                <? }else{ ?>
                    <option value="<?=$departamentosList[$i]['id_departamento'];?>"><?=ucfirst($departamentosList[$i]['nombre_departamento']); ?></option>
                <? }
            } ?>
        </select>
        <select name="id_ciudad" id="id_ciudad">
            <option value="-1" selected> -- SELECT CITY --</option>
            <?
                for($i=0; $i<= count($ciudadesList)-1; $i++){
                    echo '<option value="'.$ciudadesList[$i]['id_ciudad'].'">'.$ciudadesList[$i]['nombre_ciudad'].'</option>';
                }                            
            ?>    
        </select>
        <div id="banner_streetview"></div>
        <div id="det_banner_map"></div>
        <div class="home_btn" id="home_next" onClick="insertProyecto();">Next</div>
        <script type="text/javascript">
            det_cargarMapa();
            cargarStreetView();
         </script>
    </form>
</div>
