

<template>
<div class="card p-3">
    <vue-bootstrap-table
            :columns="columns"
            :values="values"
            :show-filter="true"
            :show-column-picker="false"
            :sortable="true"
            :paginated="true"
            :multi-column-sortable=true
            :default-order-column="columnToSortBy"
            :default-order-direction=false
            :row-click-handler=handleRowFunction

    >

        
    </vue-bootstrap-table>
    <b-modal ref="invoice_pre" size="lg" title="First Modal" ok-only no-stacking>
    <p class="my-2">First Modal</p>
    
  </b-modal>
</div>
</template>

<script>
import VueBootstrapTable from "vue2-bootstrap-table2";

    export default {
        components: {
            VueBootstrapTable: VueBootstrapTable,
        },
        data() {
            return{
            columns: [
                {
                    title:"Id",
                    visible: true,
                    editable: false
                },
                {
                    title:"Sub total",
                    visible: true,
                    editable: false
                },
                {
                    title:"Discount",
                    visible: true,
                    editable: false,
                },
                {
                    title:"Total",
                    visible: true,
                    editable: false,
                },
                {
                    title:"Date",
                    visible: true,
                    editable: false
                }
            ],
            values: [],
            itemData:[],
            columnToSortBy: "Id",
            handleRowFunction: this.handleRow,
            }
        },
        methods:{
            showModal() {
                this.$refs['invoice_pre'].show()
            },
            hideModal() {
                this.$refs['invoice_pre'].hide()
            },
            toggleModal() {
                // We pass the ID of the button that we want to return focus to
                // when the modal has hidden
                this.$refs['my-modal'].toggle('#toggle-btn')
            },
            handleRow (event, entry) {
                console.log(entry);
                this.$refs['invoice_pre'].show();
                    axios.get('/api/invoiceItem/'+entry['Id'])
                .then(response =>{           
                        console.log(response);
                })
                .catch(error =>{
                        console.log(error);
                    })
            },
            getInvoice() {
                    axios.get('/api/invoices')
                    .then(response =>{           
                           
                        response.data.forEach(idata => {
                            var date = new Date(idata.created_at);
                            var dateStr =
                            date.getFullYear() + "/"+ 
                            ("00" + (date.getMonth() + 1)).slice(-2) + "/" +  
                            ("00" + date.getDate()).slice(-2)  +" " +   
                            ("00" + date.getHours()).slice(-2) + ":" +
                            ("00" + date.getMinutes()).slice(-2) + ":" +
                            ("00" + date.getSeconds()).slice(-2);
                            this.values.push({
                                'Id' : idata.id,
                                'Sub total' : idata.subtotal,
                                'Discount' : idata.discount,
                                'Total' : idata.total,
                                'Date' : dateStr,
                            })
                        })
                    })
                    
                    .catch(error =>{
                        console.log(error);
                    })
                },

            
        },
        mounted: function(){
            this.getInvoice();
                
        }
   }


</script>
