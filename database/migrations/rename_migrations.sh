#!/bin/bash

# File: rename_migrations.sh
# Purpose: Rename migration files to preserve Laravel dependency order based on model relationships

# Ordered list of migration base names (without timestamps)
ordered_files=(
  "create_language_table"
  "create_language_keys_table"
  "create_language_translation_table"
  "create_vendors_table"
  "create_models_table"
  "create_model_versions_table"
  "create_modems_table"
  "create_boxes_table"
  "create_users_table"
  "create_depots_floors_orders_palets_table"
  "create_area_client_truck_cfgtemplate_dhcporder_table"
  "create_interface_signal_palet_box_modem_activities_tags_table"
)

# Format for timestamp
format="+%Y_%m_%d_%H%M%S"
timestamp=$(date "$format")

echo "Starting renaming process..."

for base in "${ordered_files[@]}"; do
    # Find the actual file with the current base name (including prefix)
    current_file=$(ls | grep -E "^[0-9]{4}_[0-9]{2}_[0-9]{2}_[0-9]{6}_${base}\.php")

    if [ -n "$current_file" ]; then
        new_file="${timestamp}_${base}.php"
        echo "Renaming: $current_file -> $new_file"
        mv "$current_file" "$new_file"

        # Increment timestamp by 1 minute (Linux version)
        timestamp=$(date -d "${timestamp:0:4}-${timestamp:5:2}-${timestamp:8:2} ${timestamp:11:2}:${timestamp:13:2} +1 minute" "$format")
    else
        echo "❌ File not found for: $base"
    fi
done

echo "✅ Done renaming migration files."
