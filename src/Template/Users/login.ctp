<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingrese su Correo y Contraseña para iniciar Sesión') ?></legend>
        <?= $this->Form->input('email') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->button(('Login')); ?>
    </fieldset>
<?= $this->Form->end() ?>
</div>

