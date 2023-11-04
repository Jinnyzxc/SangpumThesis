export default {
    menulist: {
        buyer: [],
        admin: [
            {
                menu: 'Seller Information',
                isIcon: false,
                iconClass: '',
                hasIcon: '',
                url: '/admin/verify-seller'
            },
            {
                menu: 'Buyer Information',
                isIcon: false,
                iconClass: '' ,
                hasIcon: '',
                url: '/admin/verify-buyer'
            }
        ],
        sellerMenuList: [
            {
                menu: 'My shop',
                isIcon: false,
                iconClass: '',
                hasIcon: '',
                url: '/seller/dashboard'
            },
            {
                menu: 'Product',
                isIcon: false,
                iconClass: '' ,
                hasIcon: '',
                url: '/seller/product'
            },
            {
                menu: 'Shipping',
                isIcon: false,
                iconClass: '' ,
                hasIcon: '',
                url: '/seller/shipment'
            },
            {
                menu: 'Finance',
                isIcon: false,
                iconClass: '' ,
                hasIcon: '',
                url: '/seller/finance'
            }
        ]
    }
}