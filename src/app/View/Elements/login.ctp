<div class="row span12">

<div class="offset3 span6 login-form well by-center">
     <div class=" row span12">
            <h3>Welcome to Lto!</h3>
      </div>

     <?php echo $this->Form->create('User', array('controller' => "users", 'action' => 'login')); ?>
      <p>
          <?php echo $this->Form->text('username', array( 'class'=> 'span10','placeholder'=> "Username",)); ?>
          <?php echo $this->Form->error('email', null, array('wrap' => "span")); ?>
      </p>

      <p>
          <?php echo $this->Form->password('password', array( 'class'=> 'span10','placeholder'=>'Password', 'autocomplete' => 'off', 'value' => '')); ?>
          <?php echo $this->Form->error('password', null, array('wrap' => "span")); ?>
      </p>
      <?php echo $this->Session->flash('auth');?>
      <div class="form-actions">
        <input class="btn btn-primary btn-large" type="submit" id="user_login_button" value="<?php echo __("Login") ?>"/>
      </div>

     <?php echo $this->Form->end(); ?>
 </div>
</div>