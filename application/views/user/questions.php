
<h1 align="center">Take Exam</h1>

<a align="center" href="http://localhost/MidAtp/userController/index/<?php echo $users['user_id'];?>">Back To Dashboard</a> 

<h3 id="times"></h3>

<h3><?php echo $all[0]['test_name']; ?></h3>
                                        
                                        

<form action="http://localhost/MidAtp/userController/result/<?php echo $all[0]['test_name']; ?>/<?php echo $users['user_id'];?>" method="post"> 

 <?php $i=1; foreach($all as $v_test) { ?>

 <?php $ans_array = array($v_test['option1'],$v_test['option2'],$v_test['option3'],$v_test['option4']);
    shuffle($ans_array); ?>
                                                                    
<label ><?php echo $i.".".$v_test['question'];?></label></br>
<input type="hidden" name="testName" value="<?php echo $v_test['test_name']?>" >
<input type="hidden" name="testName" id="timeValue" value="<?php echo $all_test -> time ?>" >
<label>
<input type="hidden" name="testName" value="<?php echo $v_test['test_name'] ?>">
<input name="form_option<?php echo $v_test['id']?>" type="radio"  value="<?=$ans_array[0]?>" />
<span class="lbl"><?=$ans_array[0]?></span>
</label>
<div class="radio">
<label>
<input name="form_option<?php echo $v_test['id']?>" type="radio"  value="<?=$ans_array[1]?>" />
<span class="lbl"><?=$ans_array[1]?></span>
</label>
</div>
<div class="radio">
<label>
<input name="form_option<?php echo $v_test['id']?>" type="radio"  value="<?=$ans_array[2]?>" />
<span class="lbl"><?=$ans_array[2]?></span>
</label>
</div>
<div class="radio">
<label>
<input name="form_option<?php echo $v_test['id']?>" type="radio" value="<?=$ans_array[3]?>" />
<span class="lbl"><?=$ans_array[3]?></span>
</label> 
</div><br><br>
<?php $i++; ?>
<?php }?>
<input type="submit" name="submit_button" value="Submit">
</form>


 <script>

var min = document.getElementById("timeValue").value;

var countDownDate = new Date().getTime() + min*60000;

var x = setInterval(function() {

    var now = new Date().getTime();
    
    var distance = countDownDate - now;
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("times").innerHTML = "Time Left : "+ minutes + "m " + seconds + "s ";
    
    if (distance < 0) {
        clearInterval(x);
        window.open("http://localhost/MidAtp/questionController/result/<?php echo $all[0]['test_name']; ?>","_self");
    }
}, 1000);

</script>