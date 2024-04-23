<script>
    let rowIdx = 0;
    function addPricingRow() {
        rowIdx++;
        const html = `
            <div class="row mb-2" id="pricingRow${rowIdx}">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 mb-2">
                        <x-input type="text" class="form-control" name="services[]" placeholder="Služba" required/>
                    </div>
                    <div class="col-xs-6 col-sm-3 mb-2">
                        <x-input type="number" class="form-control" name="prices[]" placeholder="Cena" required/>
                    </div>
                    <div class="col-xs-6 col-sm-2 mb-2">
                        <button type="button" class="btn btn-danger" onclick="removePricingRow(${rowIdx})">-</button>
                    </div>
                </div>
            </div>
    `;
        document.getElementById('pricingTable').insertAdjacentHTML('beforeend', html);
    }

    function removePricingRow(idx) {
        const row = document.getElementById(`pricingRow${idx}`);
        row.parentNode.removeChild(row);
    }
</script>
