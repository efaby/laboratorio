// http://jsfiddle.net/mekwall/sgxKJ/

$.widget("ui.autocomplete", $.ui.autocomplete, {
    options : $.extend({}, this.options, {
        multiselect: false
    }),
    _create: function(){
        this._super();

        var self = this,
            o = self.options;

        if (o.multiselect) {
            console.log('multiselect true',self.element.width());

            self.selectedItems = {};           
            self.multiselect = $("<div></div>")
                .addClass("ui-autocomplete-multiselect ui-state-default ui-widget")
                .css("width", self.element.width())
                .insertBefore(self.element)
                .append(self.element)
                .bind("click.autocomplete", function(){
                    self.element.focus();
                });
            
            var fontSize = parseInt(self.element.css("fontSize"), 10);
            function autoSize(e){
                // Hackish autosizing
                var $this = $(this);
                $this.width(1).width(this.scrollWidth+fontSize-1);
            };

            var kc = $.ui.keyCode;
            self.element.bind({
                "keydown.autocomplete": function(e){
                    if ((this.value === "") && (e.keyCode == kc.BACKSPACE)) {
                        var prev = self.element.prev();
                        delete self.selectedItems[prev.text()];
                        prev.remove();
                    }
                },
                // TODO: Implement outline of container
                "focus.autocomplete blur.autocomplete": function(){
                    self.multiselect.toggleClass("ui-state-active");
                },
                "keypress.autocomplete change.autocomplete focus.autocomplete blur.autocomplete": autoSize
            }).trigger("change");

            // TODO: There's a better way?
            o.select = o.select || function(e, ui) {

                $("<div></div>")
                    .addClass("ui-autocomplete-multiselect-item")
                    .text(ui.item.label)
                    .append(
                        $("<span></span>")
                            .addClass("ui-icon ui-icon-close")
                            .click(function(){
                                var item = $(this).parent();
                                var itemDelete = self.selectedItems[item.text()];
                                var ids = $( "#muestra_" + o.idInput).val();
                                var arrayItem = ids.split("-");
                                var index = arrayItem.indexOf(itemDelete.id.toString());
                                arrayItem.splice(index, 1);
                                $( "#muestra_" + o.idInput).val(arrayItem.join("-"));                                
                                delete self.selectedItems[item.text()];                                
                                item.remove();
                                if ($.isEmptyObject(self.selectedItems)) {
                                   $('#frmOrden').formValidation('revalidateField', 'txtmuestra_' + o.idInput); 
                                }
                            })
                    )
                    .insertBefore(self.element);
                
                self.selectedItems[ui.item.label] = ui.item;
                var ids = $( "#muestra_" + o.idInput).val() + "-" + ui.item.id;
                $( "#muestra_" + o.idInput).val(ids);  
                $('#frmOrden').formValidation('revalidateField', 'txtmuestra_' + o.idInput);
                self._value("");
                console.log("Slecetedas",self.selectedItems);
                return false;
            }
            if (o.selected.length) {
                for (i = 0; i < o.selected.length; i++) { 
                    if (o.selected[i].length > 0) {
                        $("<div></div>")
                            .addClass("ui-autocomplete-multiselect-item")
                            .text(o.selected[i])
                            .append(
                                $("<span></span>")
                                    .addClass("ui-icon ui-icon-close")
                                    .click(function(){
                                        var item = $(this).parent();
                                        var itemDelete = self.selectedItems[item.text()];
                                        var ids = $( "#muestra_" + o.idInput).val();
                                        var arrayItem = ids.split("-");
                                        var index = arrayItem.indexOf(itemDelete.id.toString());
                                        arrayItem.splice(index, 1);
                                        $( "#muestra_" + o.idInput).val(arrayItem.join("-"));                                
                                        delete self.selectedItems[item.text()];                                
                                        item.remove();
                                        if ($.isEmptyObject(self.selectedItems)) {
                                           $('#frmOrden').formValidation('revalidateField', 'txtmuestra_' + o.idInput); 
                                        } 
                                    })
                            )
                            .insertBefore(self.element);
                        self.selectedItems[o.selected[i]] = { id: o.selectedIds[i] , label: o.selected[i], value: o.selected[i] };
                      //  var ids = $( "#muestra_" + o.idInput).val() + "-" + o.selectedIds[i];
                    }
                   
                }
               // $( "#muestra_" + o.idInput).val(ids);  
                $('#frmOrden').formValidation('revalidateField', 'txtmuestra_' + o.idInput);
                self._value("");

            } 
            /*self.options.open = function(e, ui) {
                var pos = self.multiselect.position();
                pos.top += self.multiselect.height();
                self.menu.element.position(pos);
            }*/
        }

        return this;
    }
});