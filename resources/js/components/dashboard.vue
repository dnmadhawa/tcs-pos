<template>
            <div class="row">

            <ul class="nav justify-content-center m-2 ">
                <li class="nav-item  bg-secondary text-white rounded m-1">
                    <a class="nav-link active" href="#" @click="today">Today</a>
                </li>
                <li class="nav-item  bg-secondary text-white rounded m-1">
                    <a class="nav-link" href="#"  @click="month">Month</a>
                </li>
                <!-- <li class="nav-item  bg-secondary text-white rounded m-1">
                    <a class="nav-link" href="#"  @click="year">Year</a>
                </li> -->
            </ul>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{this.values.InvoiceItem}}</h3>

                        <p>Sell items</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{this.values.total}}</h3>

                        <p>Total</p>
                    </div>
                    <div class="icon">  
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{this.values.utilitypayment}}</h3>

                        <p>Utility Payment</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{this.values.expenses}}</h3>

                        <p>Expenses</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
</template>

<script>
export default{
    data() {
        return{
            values: [],
        }
    },
    methods:{
        today () {
                axios.get('/api/dashboardData')
                .then(response =>{
                    this.values =   response.data;         
                    console.log(response.data);
            })
            .catch(error =>{
                    console.log(error);
                })
        },
        month () {
                axios.get('/api/dashboardMonth/')
                .then(response =>{
                    this.values =   response.data;         
                    console.log(response.data);
            })
            .catch(error =>{
                    console.log(error);
                })
        },        
        year () {
                axios.get('/api/dashboardYear')
                .then(response =>{
                    this.values =   response.data;         
                    console.log(response.data);
            })
            .catch(error =>{
                    console.log(error);
                })
        },
    },
    mounted: function(){
         this.today();
            
    }
    
}
</script>