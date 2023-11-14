export default{
    sellerHeader: {
        left: [
            {
                menuheader: 'sms',
                isIcon: true,
                iconClass: 'sms',
                url: '/seller/dashboard' //change this url into chats  
            }
        ],
        right: [
            {
                menuheader: 'storefront',
                isIcon: true,
                iconClass: 'storefront',
                url: '/seller/dashboard'
            },
            {
                menuheader: 'logout',
                isIcon: false,
                iconClass: '',
                url: '/'
            }
        ]
    },
    buyerHeader: {
        left: [
            {
                menuheader: 'shopping_cart',
                isIcon: true,
                iconClass: 'shopping_cart',
                url: '/shopping-cart'
            }
        ],
        right: [
            {
                menuheader: 'sms',
                isIcon: true,
                iconClass: 'sms',
                url: '/buyer/chat' //change this url into chats  
            },
            {
                menuheader: 'person',
                isIcon: true,
                iconClass: 'person',
                url: '/buyer/dashboard' //change this url into chats  
            },
            {
                menuheader: 'logout',
                isIcon: false,
                iconClass: '',
                url: '/'
            }
        ]
    },
    adminHeader: {
        left: [
        ],
        right: [
            {
                menuheader: 'logout',
                isIcon: false,
                iconClass: '',
                url: '/'
            }
        ]
    }
}