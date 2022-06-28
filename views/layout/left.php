<form autocomplete style="text-align: center; margin-top: 20px"> 
        <input type="hidden" name="option" value="showproducts">
        <input autocomplete="on" type="search" name="keyword" value="<?=isset($_GET['keyword'])?$_GET['keyword']:""?>" placeholder="Enter keywords!"><br>
<input type="submit" value="Search">
</form>
<div class="pointerleft">
        <?php 
        $query = "select*from brands where status";
        $result = $connect->query($query);
 ?>


 <?php foreach($result as $item):?>
                <section class="left"><b><a href="?option=showproducts&brandid=<?=$item['id']?>"><?=$item['name']?></a></b></section>
 <?php endforeach; ?>
</div>

<style>
       .pointerleft:hover{font-size: 16.7px; transition: all 0.3s;}
</style>





