<?php 

namespace Shreyas\FuelCharges\Block\Adminhtml\Carrier\Tablerate;



class Grid extends \Magento\OfflineShipping\Block\Adminhtml\Carrier\Tablerate\Grid

{

     /**
     * Prepare table columns
     *
     * @return \Magento\Backend\Block\Widget\Grid\Extended
     */
    protected function _prepareColumns()
    {
        $return = parent::_prepareColumns();
        $return->addColumn(
            'fuel_surcharge',
            ['header' => __('Fuel Surcharge'), 'index' => 'fuel_surcharge']
        );
        return $return;
    }

}