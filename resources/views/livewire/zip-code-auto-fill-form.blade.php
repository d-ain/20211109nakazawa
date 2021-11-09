<?php
/**
 *  Copyright (c) 2021 seus31
 *  Released under the MIT license
 *  https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt
 */
?>
<div>
    <x-jet-button class="mt-4 mb-4" id="searchZipCode">{{ __('郵便番号検索') }}</x-jet-button>
</div>
<script>
    document.getElementById('searchZipCode').addEventListener('click', event => {
        let zipCode = document.getElementById('zipcode').value;
        Livewire.emit('searchZipCode', zipCode);
    });

    window.onload = function () {
        window.livewire.on('resultSearchZipCode', result => {
            if (result.status === 'OK') {
                document.querySelector('.af_pref').value = '';
                document.querySelector('.af_city').value = '';
                document.querySelector('.af_address').value = '';
                document.querySelector('.af_pref').value = document.querySelector('.af_pref').value + result.result.prefecture;
                document.querySelector('.af_city').value = document.querySelector('.af_city').value + result.result.city;
                document.querySelector('.af_address').value = document.querySelector('.af_address').value + result.result.address;
            } else {
                alert(result.message);
            }
            console.log(result)
        });
    }
</script>
