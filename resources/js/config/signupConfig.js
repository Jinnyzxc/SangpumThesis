export default {
    buyerConfig:{
        signupFields:[
            {
                "fieldCode": "firstname",
                "properties": {
                    "type": "text",
                    "label": "First Name",
                    "placeholder": "Enter First name",
                },
            },
            {
                "fieldCode": "middlename",
                "properties": {
                    "type": "text",
                    "label": "Middle Name",
                    "placeholder": "Enter Middle name",
                },
            },
            {
                "fieldCode": "lastname",
                "properties": {
                    "type": "text",
                    "label": "Lastname",
                    "placeholder": "Enter Lastname",
                },
            },
            {
                "fieldCode": "birthDate",
                "properties": {
                    "type": "date",
                    "label": "Birth Date"
                },
            }
        ],
        dataForm: {
            firstPageData: {
                firstName: '',
                middleName: '',
                lastName: '',
                bdate: '',
            },
            secondPageData: {
                nickname: '',
                zodiacSign: '',
                kpopGroup: '',
                kpopBias: '',
            },
            thirdPageData: {
                personalInfoAddress: '',
                zipCode: '',
                bankAccNum: '',
                govermentId1: 'Upload your Govt. ID',
                govermentId2: 'Upload your Govt. ID',
                combine_id: ''
            }
        },
    },
    commonConfig: {
        minMaxValidation: {
            username: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters",
                maxChar: 40,
                maxCharValidationMessage: "Maximum 40 character reached"
            },
            password: {
                minChar: 4,
                maxCharValidationMessage: "Maximum 40 character reached",
                maxChar: 40,
                minCharValidationMessage: "Enter at least 4 characters"
            }
        },
        signupFields: [
            {
                "fieldCode": "username",
                "properties": {
                    "type": "text",
                    "label": "Username",
                    "placeholder": "Enter Username",
                },
            },
            {
                "fieldCode": "password",
                "properties": {
                    "type": "password",
                    "label": "Password",
                    "placeholder": "Enter Password",
                },
            }, 
            {
                "fieldCode": "confirmPassword",
                "properties": {
                    "type": "password",
                    "label": "Confirm Password",
                    "placeholder": "Enter Confirm Password",
                },
            },
            {
                "fieldCode": "email",
                "properties": {
                    "type": "email",
                    "label": "Email",
                    "placeholder": "Enter Email",
                },
            }
        ]
    },
    sellerConfig: {
        minMaxValidation: {
            firstname: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters",
                maxChar: 40,
                maxCharValidationMessage: "Maximum 40 character reached"
            },
            middlename: {
                minChar: 4,
                maxCharValidationMessage: "Maximum 40 character reached",
                maxChar: 40,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            lastname: {
                minChar: 4,
                maxCharValidationMessage: "Maximum 40 character reached",
                maxChar: 40,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            address: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            zipCode: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            nickname: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            zodiacSign: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            kpopBias: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            kpopGroup: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            shopAddress: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            shopZipCode: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            kpopGroup: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            shopName: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            shopAddress: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            shopZipCode: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            contactNumber: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            dtiNumber: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            bankAccNum: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            brgyClearance: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
            businessPermit: {
                minChar: 4,
                minCharValidationMessage: "Enter at least 4 characters"
            },
        },
        signupFields: [
            {
                "fieldCode": "firstname",
                "properties": {
                    "type": "text",
                    "label": "First Name",
                    "placeholder": "Enter First name",
                },
            },
            {
                "fieldCode": "birthDate",
                "properties": {
                    "type": "date",
                    "label": "Birth Date"
                },
            },
            {
                "fieldCode": "middlename",
                "properties": {
                    "type": "text",
                    "label": "Middle Name",
                    "placeholder": "Enter Middle name",
                },
            },
            {
                "_fieldCode": "address",
                get "fieldCode"() {
                    return this["_fieldCode"];
                },
                set "fieldCode"(value) {
                    this["_fieldCode"] = value;
                },
                "properties": {
                    "type": "text",

                    "label": "Address",
                    "maxChar": "250",
                    "validationMessage": "Enter a valid address",
                    "minChar": "4",
                    "maxCharValidationMessage": "Maximum 250 character reached",
                    "placeholder": "Address"
                },
            },
            {
                "fieldCode": "lastname",
                "properties": {
                    "type": "text",
                    "label": "Last Name",
                    "placeholder": "Enter Last name",
                },

            },
            {
                "fieldCode": "zipCode",
                "properties": {
                    "type": "text",
                    "label": "BRGY / ZIP code",
                    "placeholder": "Enter BRGY / ZIP code",
                },
            },
            {
                "fieldCode": "nickname",
                "properties": {
                    "type": "text",
                    "label": "Nickname",
                    "placeholder": "What is your Nickname?",
                },

            },
            {
                "fieldCode": "zodiacSign",
                "properties": {
                    "type": "text",
                    "label": "Zodiac Sign",
                    "placeholder": "What is your astrological sign?",
                },

            },
            {
                "fieldCode": "kpopGroup",
                "properties": {
                    "type": "text",
                    "label": "K-Pop Group",
                    "placeholder": "What is your favorite k-pop group?",
                },

            },
            {
                "fieldCode": "kpopBias",
                "properties": {
                    "type": "text",
                    "label": "K-Pop Bias",
                    "placeholder": "Who is your first k-pop bias?",
                },

            },
            {
                "fieldCode": "shopName",
                "properties": {
                    "type": "text",
                    "label": "Shop Name",
                    "placeholder": "Enter Shop name",
                },

            },
            {
                "fieldCode": "shopAddress",
                "properties": {
                    "type": "text",
                    "label": "Shop Address",
                    "placeholder": "Enter Complete Shop Address",
                },

            },
            {
                "fieldCode": "shopZipCode",
                "properties": {
                    "type": "text",
                    "label": "BRGY / ZIP Code",
                    "placeholder": "Enter BRGY / ZIP Code",
                },

            },
            {
                "fieldCode": "dateEst",
                "properties": {
                    "type": "date",
                    "label": "Date Establish",
                    "placeholder": "Enter Date Establish",
                },

            },
            {
                "fieldCode": "contactNumber",
                "properties": {
                    "type": "text",
                    "label": "Contact No.",
                    "placeholder": "Enter Contact No.",
                }
            },
            {
                "fieldCode": "dtiNumber",
                "properties": {
                    "type": "text",
                    "label": "DTI No.",
                    "placeholder": "Enter DTI No.",
                },
            },
            {
                "fieldCode": "bankAccNum",
                "properties": {
                    "type": "text",
                    "label": "Bank Account",
                    "placeholder": "Enter your Bank/E-wallet Account No.",
                },
            },
            {
                "fieldCode": "govermentId1",
                "properties": {
                    "type": "file",
                    "label": "Goverment ID",
                    "placeholder": "Upload your Govt. ID",
                },
            },
            {
                "fieldCode": "govermentId2",
                "properties": {
                    "type": "file",
                    "label": "Goverment ID",
                    "placeholder": "Upload your Govt. ID",
                },
            },
            {
                "fieldCode": "dtiPermit",
                "properties": {
                    "type": "file",
                    "label": "DTI Permit",
                    "placeholder": "Upload your DTI permit",
                },
            },
            {
                "fieldCode": "brgyClearance",
                "properties": {
                    "type": "file",
                    "label": "Barangay Clearance",
                    "placeholder": "Upload your Barangay Clearance"
                },

            },
            {
                "fieldCode": "businessPermit",
                "properties": {
                    "type": "file",
                    "label": "Business Permit",
                    "placeholder": "Upload your Business Permit"
                },

            },
        ],
        sellerField: {
            personalInfo: {
                firstPersonalInfo: ['firstname', 'middlename', 'lastname', 'birthDate', 'address', 'zipCode'],
                secondPersonalIn: ['nickname', 'zodiacSign', 'kpopGroup', 'kpopBias']
            },
            shopInfo: ['shopName', 'shopAddress', 'shopZipCode', 'dateEst', 'contactNumber', 'dtiNumber'],
            credentials: ['bankAccNum', 'govermentId1', 'govermentId2', 'dtiPermit', 'brgyClearance', 'businessPermit']
        },
        dataForm: {
            firstname: '',
            middlename: '',
            lastname: '',
            birthDate: '',
            address: '',
            zipCode: '',
            nickname: '',
            zodiacSign: '',
            kpopGroup: '',
            kpopBias: "",
            shopName: "",
            shopAddress: "",
            shopZipCode: "",
            dateEst: "",
            contactNumber: "",
            dtiNumber: "",
            bankAccNum: "",
            govermentId1: "",
            govermentId2: "",
            dtiPermit: "",
            brgyClearance: "",
            businessPermit: "",
        },
        signupSteps: [false, false, false, false]
    }
}


