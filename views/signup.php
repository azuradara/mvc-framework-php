<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <form class="flex flex-col" action="" method="post">
            <h1 class="text-4xl font-bold mb-7 text-center">Sign Up</h1>

            <!-- input component -->
            <div class="relative h-10 input-component mb-5 empty">
                <input id="userUsername" type="text" name="userUsername"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="userUsername" class="absolute left-2 transition-all bg-white px-1">
                    Name
                </label>
            </div>
            <!-- input component -->

            <!-- input component -->
            <div class="relative h-10 input-component mb-5 empty">
                <input id="userEmail" type="text" name="userEmail"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="userEmail" class="absolute left-2 transition-all bg-white px-1">
                    Email
                </label>
            </div>
            <!-- input component -->

            <!-- input component -->
            <div class="relative h-10 input-component mb-5 empty">
                <input id="userPwd" type="password" name="userPwd"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="userPwd" class="absolute left-2 transition-all bg-white px-1">
                    Password
                </label>
            </div>
            <!-- input component -->

            <!-- input component -->
            <div class="relative h-10 input-component mb-5 empty">
                <input id="userPwdRpt" type="password" name="userPwdRpt"
                       class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"/>
                <label for="userPwdRpt" class="absolute left-2 transition-all bg-white px-1">
                    Confirm Password
                </label>
            </div>
            <!-- input component -->


            <button
                    class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 my-3"
                    type="submit" name="submit">
                Sign Up
            </button>

        </form>
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