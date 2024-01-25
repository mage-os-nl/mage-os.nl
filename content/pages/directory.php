<?php declare(strict_types=1);

use MageOsNl\Website\DirectoryForm;
use MageOsNl\Website\DirectoryProvider;

$form = new DirectoryForm();
$items = (new DirectoryProvider())->getDirectoryItems();
$currentSort = (isset($_GET['sort']) && $_GET['sort'] === 'name_desc') ? 'name_desc' : 'name_asc';
?>
<section class="bg-gray-100">
    <div class="mx-auto md:max-w-6xl px-4 xl:px-0 py-16"
         x-data="{ search: null }"
    >
        <h1 class="text-4xl text-center p-8"><?= __('Directory of Magento in Nederland') ?> (<?= count($items) ?>)</h1>

        <form method="get" class="py-4">
            <select name="sort" onChange="form.submit()" class="p-1 h-8 mr-2">
                <?php foreach ($form->getSortOptions() as $sortOptionValue => $sortOptionLabel): ?>
                    <option value="<?= $sortOptionValue ?>" <?php if ($form->isCurrentSort(
                        $sortOptionValue
                    )): ?>selected<?php endif; ?>><?= $sortOptionLabel ?></option>
                <?php endforeach; ?>
            </select>

            <input type="text"
                   name="search"
                   class="p-1 h-8"
                   value="<?= $form->getSearch() ?>"
                   placeholder="<?= __('Search') ?>"
                   onChange="form.submit()"
                   x-model="search"
            >
        </form>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <?php foreach ($items as $item): ?>
                <?php $sponsorClass = ($item->isSponsor()) ? 'border-orange-400 border-4' : ''; ?>
                <div class="<?= $sponsorClass ?> bg-white relative overflow-hidden shadow-lg ring-1 ring-black/5 p-6 text-center"
                     x-show="search === null || search === '' || '<?= strtolower($item->getName()) ?>'.indexOf(search.toLowerCase()) > -1"
                >
                    <?php if ($item->isSponsor()): ?>
                        <div class="absolute transform rotate-45 right-[-45px] top-[15px] w-[140px] bg-orange-400 text-white"
                             title="Sponsor of Mage-OS Nederland">
                            Sponsor
                        </div>
                    <?php endif; ?>
                    <a href="<?= $item->getUrl() ?>">
                        <div class="hidden md:block relative h-[250px] no-underline">
                            <h3><?= $item->getName() ?></h3>
                            <div class="absolute top-0 left-0 bottom-0 right-0 flex items-center justify-center p-4">
                                <img class="w-auto max-h-48 inline" src="<?= $item->getLogo() ?>"
                                     title="<?= $item->getName() ?>"/>
                            </div>
                            <div class="absolute bottom-2">
                                <span class="text-zinc-400"><?= $item->getRole() ?></span>
                            </div>
                        </div>
                        <div class="block md:hidden no-underline">
                            <h3 class="text-lg font-bold my-4"><?= $item->getName() ?></h3>
                            <?php if ($item->hasLogo()) : ?>
                                <div>
                                    <img src="<?= $item->getLogo() ?>"
                                         title="<?= $item->getName() ?>"/>
                                </div>
                            <?php endif; ?>
                            <div class="my-4">
                                <span class="text-zinc-400"><?= $item->getRole() ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pt-16">
            <?= markdownFile('directory') ?>
        </div>
    </div>
</section>