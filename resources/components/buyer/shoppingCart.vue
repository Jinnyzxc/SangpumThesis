<template>
    <main>
        <section>
            <div class="flex self-center">
                <div class="flex justify-center">
                    <div class="">
                        <div class="">
                            <div class="flex justify-center">
                                <table class="table shop-table">
                                    <tr>
                                        <th class="b-0"></th>
                                        <th class="b-0">image</th>
                                        <th class="b-0">Name</th>
                                        <th class="b-0">Price</th>
                                        <th class="b-0">Quantity</th>
                                        <th class="b-0 text-right">Total Price</th>
                                    </tr>
                                    <tr v-for="(item, id) in carts" :key="id">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-{{ .id }}" aria-describedby="checkbox-1" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-{{ .id }}" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="w-60 h-fit ">
                                            <img :src="item.image" alt="">
                                        </td>
                                        <td>{{ item.productName }}</td>
                                        <td>{{ item.vatiraition }}</td>
                                        <td>P{{ item.price }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" @click="editQty(item.id, +1)">+</button>
                                            {{ item.quantity }}
                                            <button class="btn btn-primary btn-sm" @click="editQty(item.id, -1)">-</button>
                                        </td>
                                        <td class="text-right">
                                            <h5 class="font-medium m-b-30">{{ item.total }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="right">Subtotal :{{ carts.subTotal }}</td>
                                        <td colspan="4" align="right">
                                            <button class="btn btn-danger">Empty Cart</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
export default {
    data() {
        return {
            carts: [
                { "subTotal": "30,000" }
            ],
        };
    },
    created() {
        this.getCartItems();
    },
    methods: {
        async getCartItems() {
            try {
                const res = await fetch("https://652d6314f9afa8ef4b275e12.mockapi.io/Cart");
                const data = await res.json();
                this.carts = new Proxy(data, {});
                console.log(this.carts);
            } catch (err) {
                console.log(err);
            }
        },
        async editQty(id, quantity) {
            try {
                const res = await fetch("https://652d6314f9afa8ef4b275e12.mockapi.io/Cart/:" + id, {
                    method: "PUT",
                    body: JSON.stringify({
                        productId: id,
                        quantity: quantity,
                    }),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                    },
                });
                this.getCartItems();
            } catch (err) {
                console.log(err);
            }
        },
        async emptyCart() {
            try {
                const res = await fetch("https://652d6314f9afa8ef4b275e12.mockapi.io/cart/:" + id, {
                    method: "DELETE",
                });
                const data = await res.json();
                this.$router.push({
                    path: "/",
                });
            } catch (err) {
                console.log(err);
            }
        },
    },
};
</script>