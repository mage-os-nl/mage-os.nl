<?php declare(strict_types=1);

?>
<section>
    <div class="mx-auto md:max-w-6xl px-4 xl:px-0 py-16">
        <?= markdownFile('become-member/intro') ?>

        <div class="w-full bg-gray-50 rounded shadow-md p-8">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    <?= __('Your email') ?>
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       name="email" id="email" type="email" placeholder="yourname@example.org" required>
            </div>
            <div class="my-8">
                <form class="" id="bank-form" method="get">
                    <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            onClick="bankFormSubmit()">
                        <?= __('Pay now') ?>
                    </button>
                </form>
            </div>
        </div>

        <script>
            function bankFormSubmit() {
                const url = 'https://bunq.me/MageOSNederland/10/';
                const email = document.getElementById('email').value;
                if (!email) {
                    alert('Not a valid email address');
                    return;
                }

                let form = document.getElementById('bank-form');
                form.action = url + email;
                form.submit();
            }
        </script>

        <div class="mt-8">
        <?= markdownFile('become-member/bottom') ?>
        </div>
    </div>
</section>
