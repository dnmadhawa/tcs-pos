<template>

<div class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="card p-2 pt-4 d-flex flex-row justify-content-center">
                <div class="form-group d-flex flex-row col-md-4 align-items-center">
                    <label class="m-3">Barcode</label>
                    <input type="text" class="form-control" autofocus v-on:change="barcode($event)">
                </div>
                <div class="form-group d-flex flex-row col-md-4 align-items-center">
                    <label class="m-3">Name</label>
                    <select class="select2" style="width: 100%;" v-on:change="barcossde($event)">
                        <option value="" disabled selected>Search By Name..</option>
                        <option v-for="product in products" v-bind:key="product.id" :value="product.barcodeid" >{{product.productname}}</option>
                    </select>
                </div>
            </div>
            <div class="card p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Sale Price</th>
                            <th>#</th>
                        </tr>
                    </thead>
                     <Items @delete-item="deleteItem" @cal-sale-price="calSalePrice" @cal-discount-price="calDiscountPrice" :items="items"/>
      
                </table>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <div class="form-group">
                    <label>Sub Total</label>
                    <input type="number" class="form-control"  v-model.number="subTotal" readonly>
                </div>
                <div class="form-group">
                    <label>Discount</label>
                    <input type="number" class="form-control" v-model.number="tDiscount">
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="number" class="form-control" value="0" readonly v-model.number="total">
                </div>
            </div>
            <div class="card p-3">
                <div class="form-group">
                    <label>Pay Amount</label>
                    <input type="number" class="form-control" v-model.number="payAmount">
                </div>
                <div class="form-group">
                    <label>Balance</label>
                    <input type="number" class="form-control" value="0" readonly v-model.number="balance">
                </div>
            </div>
            <button type="button" class="btn btn-block btn-primary" @click="getProducts">Submit</button>
        </div>
    </div>
</div>
    
</template>

<script>
import Items from './components/invoice/Items.vue';
    export default {
        components: { Items },
        name:'Invoiceform',
        data(){
            return{
                items:[],
                products:[],
                tDiscount:0,
                payAmount:0,
            }
        },
        methods:{
            getProducts() {
                axios.get('http://127.0.0.1:8000/api/products')
                .then(response =>{
                    
                    this.products =response.data;
                    console.log(this.products);
                })
                .catch(error =>{
                    console.log(error);
                })
                
            },
            barcode(event){
                this.products.find(product => {
                    if (product.barcodeid === event.target.value) {
                        console.log("gg");
                    }else{
                        console.log("hee");
                    }
                })
                // console.log(this.products.filter((product)=>product.barcodeid == event.target.value ));
                // this.items.push({
                //     id:6,
                //     barcode:'TCS163',
                //     name:'Moblile',
                //     price:123.00,
                //     qty:1.00,
                //     discount:0.00,
                //     salePrice:123.00,
                // });
            },
            barcossde(event){
                console.log("dsd");
                // this.items.push({
                //     id:6,
                //     barcode:'TCS163',
                //     name:'Moblile',
                //     price:123.00,
                //     qty:1.00,
                //     discount:0.00,
                //     salePrice:123.00,
                // });
            },
            deleteItem(id){
                this.items = this.items.filter((item)=>item.id !== id );
            },
            calSalePrice(index,qty){
                this.items[index].qty = qty;
                this.calAll(index);
            },
            calDiscountPrice(index,dis){
                this.items[index].discount = dis;
                this.calAll(index);
            },
            calAll(index){
                var tot = this.items[index].price*this.items[index].qty;
                this.items[index].salePrice = tot-this.items[index].discount;
            },
            add(){
                 this.items.push({
                    id:6,
                    barcode:'TCS163',
                    name:'Moblile',
                    price:123.00,
                    qty:1.00,
                    discount:0.00,
                    salePrice:123.00,
                });
            }

        },
        mounted: function(){
            
            this.getProducts();
            
        },
        computed: {
            total: function () {
                return this.subTotal-this.tDiscount;
            
            },
            subTotal: function () {
                return this.items.reduce((total, item) => {
                    return total + (item.qty * item.price)-item.discount;
                    }, 0);
            },
            balance: function () {
                return this.payAmount- this.total;
            
            },
        },
        created(){
            this.items =[
                {
                    id:1,
                    barcode:'TCS123',
                    name:'Moblile',
                    price:123.00,
                    qty:1.00,
                    discount:0.00,
                    salePrice:123.00,
                },
                {
                    id:2,
                    barcode:'TCS124',
                    name:'Moblile',
                    price:123.00,
                    qty:1.00,
                    discount:0.00,
                    salePrice:123.00,
                },
            ]
        }
    }
</script>
