<!-- สร้างตัวแปร  $errors เป็น Arrat -->
<?php $errors = array(); ?>
<!-- เช็ค Condition ถ้า $errors มีจำนวนมากกว่า 1 ให้ทำงาน  -->
<?php if (count($errors) > 0) : ?>
    <div class="error">
        <!-- ทำการ Loop โดยใช้คำสั่ง foreach ($array as $value) ค่า $errors ไปแสดงยัง $error -->
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>