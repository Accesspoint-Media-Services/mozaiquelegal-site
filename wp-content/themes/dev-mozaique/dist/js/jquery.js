/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************!*\
  !*** ./src/js/jquery.js ***!
  \**************************/
jQuery(document).ready(function ($) {
  var TIMER_DURATION = 15000;
  var $sections = $(".accordion-section");
  var currentSectionIndex = 0;
  var autoPlayTimer;
  var progressInterval;
  var hasStarted = false;
  var isPaused = false;
  var pausedProgress = 0;

  // Check if sections exist
  if ($sections.length === 0) return;

  // Setup all sections
  $sections.each(function () {
    var $section = $(this);

    // Hide all accordion content
    $section.find(".accordion-features .accordion-features-items").hide();

    // Show first image of each section by default
    $section.find(".glightbox").removeClass("opacity-100 pointer-events-auto").addClass("opacity-0 pointer-events-none");
    $section.find('.glightbox[data-index="0"]').removeClass("opacity-0 pointer-events-none").addClass("opacity-100 pointer-events-auto");

    // Show first accordion of each section (no timer yet)
    $section.find('.accordion-features[data-index="0"] .accordion-features-items').show();
  });
  function resetAllProgressBars() {
    clearInterval(progressInterval);
    $('.accordion-progress-bar').stop().css('width', '0%');
    pausedProgress = 0;
  }
  function startProgress($accordion) {
    var startFrom = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    clearInterval(progressInterval);
    var $progressBar = $accordion.find('.accordion-progress-bar');
    var progress = startFrom;
    $progressBar.css('width', '0%');
    progressInterval = setInterval(function () {
      if (!isPaused) {
        progress += 100 / (TIMER_DURATION / 50);
        pausedProgress = progress;
        $progressBar.css('width', progress + '%');
        if (progress >= 100) {
          clearInterval(progressInterval);
        }
      }
    }, 50);
  }
  function resetSectionToFirst($section) {
    // Close all accordions in this section
    $section.find(".accordion-features .accordion-features-items").hide();
    $section.find('.accordion-progress-bar').css('width', '0%');

    // Open first accordion
    $section.find('.accordion-features[data-index="0"] .accordion-features-items').show();

    // Reset to first image - update glightbox links
    $section.find(".glightbox").removeClass("opacity-100 pointer-events-auto").addClass("opacity-0 pointer-events-none");
    $section.find('.glightbox[data-index="0"]').removeClass("opacity-0 pointer-events-none").addClass("opacity-100 pointer-events-auto");
  }
  function stopAutoPlay() {
    clearInterval(autoPlayTimer);
    clearInterval(progressInterval);
  }
  function switchToSection(newSectionIndex) {
    if (newSectionIndex === currentSectionIndex) return;

    // Stop current timers
    stopAutoPlay();

    // Reset old section back to index 0
    var $oldSection = $sections.eq(currentSectionIndex);
    resetSectionToFirst($oldSection);

    // Update current section
    currentSectionIndex = newSectionIndex;

    // Start timer on new section's first accordion
    var $newSection = $sections.eq(currentSectionIndex);
    var $firstAccordion = $newSection.find('.accordion-features[data-index="0"]');
    resetAllProgressBars();
    startProgress($firstAccordion);
    startAutoPlay();
  }
  function openAccordion($section, index) {
    var $accordion = $section.find('.accordion-features[data-index="' + index + '"]');

    // Close all accordions in this section only
    $section.find(".accordion-features .accordion-features-items").slideUp();
    $section.find('.accordion-progress-bar').css('width', '0%');

    // Open target accordion
    $accordion.find(".accordion-features-items").slideDown();

    // Switch images within the section - update glightbox links
    $section.find(".glightbox").removeClass("opacity-100 pointer-events-auto").addClass("opacity-0 pointer-events-none");
    $section.find('.glightbox[data-index="' + index + '"]').removeClass("opacity-0 pointer-events-none").addClass("opacity-100 pointer-events-auto");

    // Start progress bar
    startProgress($accordion);
  }
  function startAutoPlay() {
    clearInterval(autoPlayTimer);
    autoPlayTimer = setInterval(function () {
      if (isPaused) return;
      var $currentSection = $sections.eq(currentSectionIndex);
      var totalAccordions = $currentSection.find(".accordion-features").length;
      var $activeAccordion = $currentSection.find('.accordion-features-items:visible').closest('.accordion-features');
      if ($activeAccordion.length === 0) {
        $activeAccordion = $currentSection.find('.accordion-features[data-index="0"]');
      }
      var currentAccordionIndex = $activeAccordion.length ? $activeAccordion.data('index') : -1;
      var nextAccordionIndex = currentAccordionIndex + 1;

      // Move to next accordion in same section
      if (nextAccordionIndex < totalAccordions) {
        openAccordion($currentSection, nextAccordionIndex);
      }
      // Loop back to first accordion in same section (don't auto-advance to next section)
      else {
        openAccordion($currentSection, 0);
      }
    }, TIMER_DURATION);
  }

  // Pause on hover
  $(".accordion-features").on("mouseenter", function () {
    var $accordion = $(this);
    var $section = $accordion.closest('.accordion-section');
    var sectionIndex = $sections.index($section);
    var isActive = $accordion.find(".accordion-features-items").is(":visible");
    if (isActive && sectionIndex === currentSectionIndex) {
      isPaused = true;
      $accordion.find('.accordion-progress-bar').removeClass('bg-dark').addClass('bg-pink');
    }
  });

  // Resume on mouse leave
  $(".accordion-features").on("mouseleave", function () {
    var $accordion = $(this);
    var $section = $accordion.closest('.accordion-section');
    var sectionIndex = $sections.index($section);
    var isActive = $accordion.find(".accordion-features-items").is(":visible");
    if (isActive && sectionIndex === currentSectionIndex) {
      isPaused = false;
      $accordion.find('.accordion-progress-bar').removeClass('bg-pink').addClass('bg-dark');
      startProgress($accordion, pausedProgress);
    }
  });

  // Manual click
  $(".accordion-features .accordion-features-heading").on("click", function () {
    var $accordion = $(this).closest('.accordion-features');
    var $section = $(this).closest('.accordion-section');
    var index = $accordion.data('index');
    var clickedSectionIndex = $sections.index($section);
    if (clickedSectionIndex !== currentSectionIndex) {
      var $otherSection = $sections.eq(currentSectionIndex);
      resetSectionToFirst($otherSection);
    }
    currentSectionIndex = clickedSectionIndex;
    isPaused = false;
    openAccordion($section, index);
    startAutoPlay();
  });

  // Track which sections are visible
  var visibleSections = new Set();

  // Observer for first section - starts everything
  var startObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting && !hasStarted) {
        hasStarted = true;
        var $firstAccordion = $sections.eq(0).find('.accordion-features[data-index="0"]');
        startProgress($firstAccordion);
        startAutoPlay();
      }
    });
  }, {
    threshold: 0.3
  });

  // Observer to track when sections enter/leave viewport
  var sectionObserver = new IntersectionObserver(function (entries) {
    if (!hasStarted) return;
    entries.forEach(function (entry) {
      var $section = $(entry.target);
      var sectionIndex = $sections.index($section);
      if (entry.isIntersecting) {
        // Section entered viewport
        visibleSections.add(sectionIndex);
      } else {
        // Section left viewport
        visibleSections["delete"](sectionIndex);
      }
    });

    // Determine which section should be active
    // Pick the lowest indexed visible section, or if current section left, pick the next visible one
    if (visibleSections.size > 0) {
      var visibleArray = Array.from(visibleSections).sort(function (a, b) {
        return a - b;
      });

      // If current section is no longer visible, switch to the first visible one
      if (!visibleSections.has(currentSectionIndex)) {
        var newSection = visibleArray[0];
        switchToSection(newSection);
      }
    }
  }, {
    threshold: 0.5 // Higher threshold - section must be 50% visible
  });

  // Observe first section for initial start
  startObserver.observe($sections.eq(0)[0]);

  // Observe all sections for visibility changes
  $sections.each(function () {
    sectionObserver.observe(this);
  });
});
jQuery(document).ready(function ($) {
  // faqs block
  $(".faq-block").addClass("");
  $(".faq-block .faq-answer").hide().addClass("");
  $(".faq-block .faq-question").addClass("");
  $(".faq-block .faq-question").append("\n    <svg class=\"icon flex-shrink-0 ml-4 transition-transform duration-300\" xmlns=\"http://www.w3.org/2000/svg\" width=\"21\" height=\"14\" viewBox=\"0 0 21 14\" fill=\"none\">\n    <path d=\"M20.3662 0.666748C20.3662 0.666748 17.2982 2.24467 14.6519 4.79175C12.0056 7.33883 10.3662 11.6667 10.3662 11.6667C10.3662 11.6667 8.38074 7.00574 6.0805 4.79175C3.78025 2.57776 0.366211 0.666747 0.366211 0.666747\" stroke=\"#1C0B8C\" stroke-width=\"1.5\"/>\n    </svg>  ");

  // Open first FAQ in product-content block
  $(".product-content .faq-block:first-child .faq-answer").show();
  $(".product-content .faq-block:first-child .faq-question .icon").addClass("rotate-180");
  $(".faq-block .faq-question").on("click", function () {
    // Close all other accordions and reset their icons
    $(".faq-block .faq-question").not(this).find(".icon").removeClass("rotate-180");
    $(".faq-block .faq-answer").not($(this).next(".faq-answer")).slideUp();

    // Toggle the clicked one
    $(this).find(".icon").toggleClass("rotate-180");
    $(this).next(".faq-answer").slideToggle();
  });
  $(".offcanvas-form input#search").keyup(function () {
    if ($(this).val().length > 0) {
      $(".offcanvas-form #datafetch").show();
    } else {
      $(".offcanvas-form #datafetch").hide();
    }
  });
});
/******/ })()
;