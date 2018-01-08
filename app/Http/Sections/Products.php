<?php
namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

/**
 * Class SiteSettings
 *
 * @property \App\SiteSetting $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Products extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Товары";

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()/*->with('users')*/
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'Название')->setWidth('200px'),
                AdminColumn::text('price', 'Цена')
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {

        return AdminForm::panel()->addBody([
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('name', 'Название')->required(),
            AdminFormElement::text('price', 'Цена')->required(),
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //return $this->onEdit(null);
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название')->required(),
            AdminFormElement::text('price', 'Цена')->required(),
        ]);

    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
