
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username'); echo "username mặc định: cake";
        echo $this->Form->input('password');echo "pass mặc định: cake";
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>