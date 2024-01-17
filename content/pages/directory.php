<?php declare(strict_types=1);

use MageOsNl\Website\DirectoryForm;
use MageOsNl\Website\DirectoryProvider;

$form = new DirectoryForm();
$items = (new DirectoryProvider())->getDirectoryItems();
$currentSort = (isset($_GET['sort']) && $_GET['sort'] === 'name_desc') ? 'name_desc' : 'name_asc';
?>
<section class="bg-gray-100">
    <div class="mx-auto md:max-w-6xl px-4 xl:px-0 py-16">
        <h1 class="text-4xl text-center p-8"><?= __('Directory of Magento in Nederland') ?> (<?= count($items) ?>)</h1>


        <form method="get" class="py-4">
            <select name="sort" onChange="form.submit()">
                <?php foreach ($form->getSortOptions() as $sortOptionValue => $sortOptionLabel): ?>
                    <option value="<?= $sortOptionValue ?>" <?php if ($form->isCurrentSort(
                        $sortOptionValue
                    )): ?>selected<?php endif; ?>><?= $sortOptionLabel ?></option>
                <?php endforeach; ?>
            </select>

            <input type="text" name="search" class="p-1"
                   value="<?= $form->getSearch() ?>" placeholder="<?= __('Search') ?>" onChange="form.submit()">
        </form>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <?php foreach ($items as $item): ?>
                <div class="bg-white shadow-lg ring-1 ring-black/5 p-6 text-center">
                    <a class="no-underline " href="<?= $item->getUrl() ?>">
                        <h3><?= $item->getName() ?></h3>
                        <div class="p-4">
                            <img class="w-auto max-h-48 inline" src="<?= $item->getLogo() ?>"
                                 title="<?= $item->getName() ?>">
                        </div>
                        <span class="text-zinc-400"><?= $item->getRole() ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pt-16">
            <?= markdownFile('directory') ?>
        </div>
    </div>
</section>