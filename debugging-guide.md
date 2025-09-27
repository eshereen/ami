# Live Server Debugging Guide

## White Page Issue Troubleshooting

If you're experiencing white pages when clicking "Call Now" or "Get Free Quote" buttons, follow these steps:

### 1. Check Browser Console
Open your browser's Developer Tools (F12) and check the Console tab for errors:

```javascript
// Look for these debug messages:
"Page loaded successfully"
"Alpine.js available: true/false"
"Tailwind available: true/false"
"Font Awesome available: true/false"
```

### 2. Common Issues and Solutions

#### Issue: CDN Loading Failures
**Symptoms:** White page, console errors about failed network requests
**Solution:** The fallback CSS and error handling should prevent this, but check:
- Internet connection
- CDN availability
- Firewall blocking external resources

#### Issue: JavaScript Errors
**Symptoms:** Console shows JavaScript errors
**Solution:** Check for:
- Missing dependencies
- Syntax errors in custom JavaScript
- Conflicting scripts

#### Issue: Alpine.js Not Loading
**Symptoms:** Interactive elements don't work
**Solution:** Check console for "Alpine.js available: false"

### 3. Quick Fixes

#### Force Reload Dependencies
Add this to your browser console to force reload:
```javascript
// Reload Tailwind
location.reload();

// Check if scripts loaded
console.log('Scripts loaded:', {
    alpine: typeof Alpine !== 'undefined',
    tailwind: typeof tailwind !== 'undefined',
    fontawesome: document.querySelector('link[href*="font-awesome"]') !== null
});
```

#### Test Button Functionality
Click the buttons and check console for:
```javascript
"Quote button clicked"
"Call button clicked"
```

### 4. Production Optimizations

For production, consider:
1. **Local Assets:** Download and host CDN files locally
2. **Minification:** Use minified versions of all scripts
3. **Caching:** Implement proper cache headers
4. **Error Monitoring:** Add error tracking service

### 5. Emergency Fallback

If issues persist, the fallback CSS (`/css/fallback.css`) provides basic styling when Tailwind fails to load.

### 6. Contact Information

The tel: links should work on mobile devices. If not:
- Check phone number format: `tel:+201223907708`
- Ensure no spaces or special characters in href
- Test on actual mobile device, not just browser

## Testing Checklist

- [ ] Page loads without white screen
- [ ] Console shows "Page loaded successfully"
- [ ] All dependencies load (check console logs)
- [ ] Buttons respond to clicks
- [ ] Tel: links work on mobile
- [ ] No JavaScript errors in console
