<?= $this->Form->create(null, ['url' => ['controller' => 'Articles', 'action' =>'listarticles']]); ?>
     <button type="submit" onclick="getConfirmation()">Tham gia ban</button>
<?=$this->Form->end();?>

 <script type="text/javascript">
         <!--
            function getConfirmation(){
               var retVal = confirm("Do you want to embark the department?");
               if( retVal == true ){
                  document.write ("User wants!");
                  return true;
               }
               else{
                  Document.write ("User does not want!");
                  return false;
               }
            }
         //-->
      </script>