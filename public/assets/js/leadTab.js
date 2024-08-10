function initialize_foo_crm_detail_tab(params) {
    params = params || {};

    if (!params.entity_type || !params.entity_id) {
        return;
    }

    let promise = (new Promise(function (resolve, reject) {
        var checkTabManagerCount = 0;

        var checkTabManager = function () {
            if (20 < ++checkTabManagerCount) {
                return reject();
            }

            var detailId = [params.entity_type, params.entity_id, 'details'].join('_');
            var detailManager = BX.Crm.EntityDetailManager.items[detailId];

            if (!detailManager) {
                detailManager = BX.Crm.EntityDetailManager.items['returning_' + detailId];
            }

            if (!detailManager) {
                return setTimeout(checkTabManager, 1000);
            }

            return resolve(detailManager._tabManager);
        };

        checkTabManager();
    })).then(
        function (tabManager) {
            var tabData = {
                id: 'tab_tarifficator',
                name: 'Tarifficator',
                html: `
            <span class="main-buttons-item-link">
                <span class="main-buttons-item-icon"></span>
                <span class="main-buttons-item-text">
                    <span class="main-buttons-item-drag-button" data-slider-ignore-autobinding="true"></span>
                    <span class="main-buttons-item-text-title">
                        <span class="main-buttons-item-text-box">Тарификатор<span class="main-buttons-item-menu-arrow"></span></span>
                    </span>
                    <span class="main-buttons-item-edit-button" data-slider-ignore-autobinding="true"></span>
                    <span class="main-buttons-item-text-marker"></span>
                </span>
                <span class="main-buttons-item-counter"></span>
            </span>`,
                loader: {
                    serviceUrl: '/foo.php?sessid=' + BX.bitrix_sessid(),
                    componentData: {foo: 'bar'},
                    container: null, // Обновлено: будет установлено позже
                    tabId: 'tab_tarifficator'
                }
            };

            // Создание контейнера вкладки
            var tabContainer = BX.create(
                'div',
                {
                    attrs: {
                        className: 'main-buttons-item',
                        id: 'crm_scope_detail_' + params.entity_id + '__' + tabData.id,
                        'data-id': tabData.id
                    },
                    html: tabData.html
                }
            );

            // Найти контейнер для добавления новой вкладки
            var container = document.querySelector('.main-buttons-inner-container');
            if (!container) {
                console.error('Не удалось найти контейнер для вкладок');
            } else {
                // Добавить вкладку в конец контейнера
                container.appendChild(tabContainer);

                // Обновить ссылку на контейнер в `loader`
                tabData.loader.container = tabContainer;

                tabManager._items.push(
                    BX.Crm.EntityDetailTab.create(
                        tabData.id,
                        {
                            manager: tabManager,
                            data: tabData,
                            container: tabContainer
                        }
                    )
                );
            }

        })}