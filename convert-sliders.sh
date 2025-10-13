#!/bin/bash

# Script to convert slider images to WebP format with responsive sizes
# Usage: Place your slider-1.jpg, slider-2.jpg, slider-3.jpg in public/imgs/
# Then run: bash convert-sliders.sh

echo "🖼️  Starting slider image conversion to WebP format..."

# Navigate to the images directory
cd "$(dirname "$0")/public/imgs" || exit 1

# Quality setting (adjust between 80-95 for balance between quality and file size)
QUALITY=85

# Function to convert a single slider image
convert_slider() {
    local input_file=$1
    local base_name="${input_file%.*}"

    if [ ! -f "$input_file" ]; then
        echo "❌ $input_file not found, skipping..."
        return
    fi

    echo "📸 Converting $input_file..."

    # Desktop version (original size)
    cwebp -q $QUALITY "$input_file" -o "${base_name}.webp"
    echo "   ✅ Created ${base_name}.webp (desktop)"

    # Tablet version (1024px width)
    cwebp -q $QUALITY -resize 1024 0 "$input_file" -o "${base_name}-tablet.webp"
    echo "   ✅ Created ${base_name}-tablet.webp (tablet)"

    # Mobile version (640px width)
    cwebp -q $QUALITY -resize 640 0 "$input_file" -o "${base_name}-mobile.webp"
    echo "   ✅ Created ${base_name}-mobile.webp (mobile)"

    echo ""
}

# Check if cwebp is installed
if ! command -v cwebp &> /dev/null; then
    echo "❌ Error: cwebp is not installed!"
    echo "Install it with: brew install webp"
    exit 1
fi

# Convert all slider images
for i in 1 2 3; do
    # Try .jpg first, then .jpeg, then .png
    if [ -f "slider-$i.jpg" ]; then
        convert_slider "slider-$i.jpg"
    elif [ -f "slider-$i.jpeg" ]; then
        convert_slider "slider-$i.jpeg"
    elif [ -f "slider-$i.png" ]; then
        convert_slider "slider-$i.png"
    else
        echo "⚠️  Warning: slider-$i not found (tried .jpg, .jpeg, .png)"
    fi
done

echo "✨ Conversion complete!"
echo ""
echo "📊 Generated files:"
ls -lh slider-*.webp 2>/dev/null || echo "No WebP files found"
echo ""
echo "💡 Tip: You can now delete the original JPG/PNG files if you want to save space"

