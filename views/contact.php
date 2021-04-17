<?php
/** @var $this \app\core\View */

/** @var $model \app\models\ContactForm */

use app\core\forms\TextAreaInput;

$this->title = 'Contact'
?>
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <h1 class="text-4xl font-bold mb-7 text-center">Contact</h1>
        <?php $form = \app\core\forms\Form::open('', 'post') ?>
        <div class="flex flex-col">

            <?php echo $form->input($model, 'name') ?>
            <?php echo $form->input($model, 'email') ?>
            <?php echo new TextAreaInput($model, 'address') ?>

            <button
                    class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 my-3"
                    type="submit" name="submit">
                Send
            </button>
        </div>

        <?php $form = \app\core\forms\Form::open('', 'post') ?>
    </section>
</main>


<style>
    label {
        top: 0;
        transform: translateY(-50%);
        font-size: 11px;
        color: rgba(37, 99, 235, 1);
    }

    .empty input:not(:focus) + label {
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
    }

    input:not(:focus) + label {
        color: rgba(70, 70, 70, 1);
    }

    input {
        border-width: 1px;
    }

    input:focus {
        outline: none;
        border-color: rgba(37, 99, 235, 1);
    }
</style>
<script>
    // document.getElementById('name').value = 'John Doe'
    // document.getElementById('email').value = 'john.doe@mail.com'
    document.getElementById('email').focus()
    const allInputs = document.querySelectorAll('input');
    for (const input of allInputs) {
        input.addEventListener('input', () => {
            const val = input.value
            if (!val) {
                input.parentElement.classList.add('empty')
            } else {
                input.parentElement.classList.remove('empty')
            }
        })
    }
</script>