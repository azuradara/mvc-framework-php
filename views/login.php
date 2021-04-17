<?php
/** @var $model \app\models\Login */
?>

<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <h1 class="text-4xl font-bold mb-7 text-center">Log In</h1>
        <?php $form = \app\core\forms\Form::open('', 'post'); ?>
        <div class="flex flex-col">

            <?php echo $form->input($model, 'userUsername'); ?>
            <?php echo $form->input($model, 'userPwd')->toPwd(); ?>

            <button
                    class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 my-3"
                    type="submit" name="submit">
                Log In
            </button>

        </div>
        <?php \app\core\forms\Form::close() ?>

    </section>
</main>

<div class="max-w-lg mx-auto text-center mt-12 mb-6">
    <p class="text-gray-800">
        Already have an account?
        <a class="font-bold hover:underline" href="#">Log In</a>.
    </p>
</div>

<!-- assets -->

<style>
    label {
        top: 0%;
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
    document.querySelector('#userUsername').focus()
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