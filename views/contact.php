<?php
/** @var $this \app\core\View */
$this->title = 'Contact'
?>
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <form class="flex flex-col" action="" method="post">
            <h1 class="text-4xl font-bold mb-7 text-center">Contact</h1>

            <div class="relative h-10 input-component mb-5 empty">
                <input id="name" type="text" name="name"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="name" class="absolute left-2 transition-all bg-white px-1">
                    Name
                </label>
            </div>
            <!-- This is the input component -->
            <div class="relative h-10 input-component mb-5 empty">
                <input id="email" type="text" name="email"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="email" class="absolute left-2 transition-all bg-white px-1">
                    E-mail
                </label>
            </div>
            <!-- This is the input component -->
            <div class="relative h-10 input-component empty">
                <input id="address" type="text" name="address"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="address" class="absolute left-2 transition-all bg-white px-1">
                    Address
                </label>
            </div>

            <button
                    class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 my-3"
                    type="submit" name="submit">
                Send
            </button>

        </form>
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