        // 유저 약관관련
        const termsUser = document.getElementById("termsUser");
        const userCheckbox = document.getElementById("userCheckbox");
        const registUser = document.getElementById("registUser");

        // 셀러 약관관련
        const termsSeller = document.getElementById("termsSeller");
        const sellerCheckbox = document.getElementById('sellerCheckbox');
        const registSeller = document.getElementById('registSeller');

        document.addEventListener("DOMContentLoaded", function() {

            function checkScrollPosition() {
                const scrolledRatio =
                    termsUser.scrollTop / (termsUser.scrollHeight - termsUser.clientHeight);

                if (scrolledRatio >= 0.95) {
                    userCheckbox.disabled = false;
                    registUser.disabled = false;
                }
            }

            termsUser.addEventListener("scroll", checkScrollPosition);
        });


        userCheckbox.addEventListener('click', function() {
            if (userCheckbox.checked) {
                registUser.style.display = 'block';
            } else {
                registUser.style.display = 'none';
            }
        });

        sellerCheckbox.addEventListener('click', function() {
            if (sellerCheckbox.checked) {
                registSeller.style.display = 'block';
            } else {
                registSeller.style.display = 'none';
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            
            function checkScrollPosition() {
                const scrolledRatio =
                termsSeller.scrollTop / (termsSeller.scrollHeight - termsSeller.clientHeight);

                if (scrolledRatio >= 0.95) {
                    sellerCheckbox.disabled = false;
                    registSeller.disabled = false;
                }
            }

            termsSeller.addEventListener("scroll", checkScrollPosition);
        });