#!/bin/bash

cd database/migrations

# Base date
base_date="2025_06_11"

# Set time counters for ordering (HHMMSS format)
time_vendor="165450"
time_models="165500"
time_users="165550"
time_language="180851"
time_language_keys="180921"
time_language_translation="181002"
time_model_versions="181515"
time_modems="181614"
time_boxes="182135"
time_depots_floors_orders_palets="182311"
time_area_client_truck_cfgtemplate_dhcporder="182538"
time_interface_signal_palet_box_modem_activities_tags="183001"

mv ${base_date}_165450_create_vendors_table.php ${base_date}_${time_vendor}_create_vendors_table.php
mv ${base_date}_165500_create_models_table.php ${base_date}_${time_models}_create_models_table.php
mv ${base_date}_165636_create_users_table.php ${base_date}_${time_users}_create_users_table.php
mv ${base_date}_180851_create_language_table.php ${base_date}_${time_language}_create_language_table.php
mv ${base_date}_180921_create_language_keys_table.php ${base_date}_${time_language_keys}_create_language_keys_table.php
mv ${base_date}_181002_create_language_translation_table.php ${base_date}_${time_language_translation}_create_language_translation_table.php
mv ${base_date}_181515_create_model_versions_table.php ${base_date}_${time_model_versions}_create_model_versions_table.php
mv ${base_date}_181614_create_modems_table.php ${base_date}_${time_modems}_create_modems_table.php
mv ${base_date}_182135_create_boxes_table.php ${base_date}_${time_boxes}_create_boxes_table.php
mv ${base_date}_182311_create_depots_floors_orders_palets_table.php ${base_date}_${time_depots_floors_orders_palets}_create_depots_floors_orders_palets_table.php
mv ${base_date}_182538_create_area_client_truck_cfgtemplate_dhcporder_table.php ${base_date}_${time_area_client_truck_cfgtemplate_dhcporder}_create_area_client_truck_cfgtemplate_dhcporder_table.php
mv ${base_date}_183001_create_interface_signal_palet_box_modem_activities_tags_table.php ${base_date}_${time_interface_signal_palet_box_modem_activities_tags}_create_interface_signal_palet_box_modem_activities_tags_table.php

