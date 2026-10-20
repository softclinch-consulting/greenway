<?php
// Structured JSON-LD Schemas for Green Way Technical Blog Articles
$blog_schemas = [
    'cpcb-epr-used-oil-compliance' => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "@id": "https://wasteoil.in/cpcb-epr-used-oil-compliance#article",
      "isPartOf": {
        "@type": "WebPage",
        "@id": "https://wasteoil.in/cpcb-epr-used-oil-compliance"
      },
      "headline": "CPCB EPR for Used Oil in India: Complete Compliance, Target & Certificate Guide for Manufacturers & Bulk Users",
      "description": "Comprehensive guide to CPCB EPR used oil rules, targets, certificates, Form-10 manifests, and SPCB compliance for industrial units across India.",
      "image": "https://wasteoil.in/img/epr-used-oil-compliance.png",
      "datePublished": "2026-10-14T08:00:00+05:30",
      "dateModified": "2026-10-14T08:00:00+05:30",
      "mainEntityOfPage": "https://wasteoil.in/cpcb-epr-used-oil-compliance",
      "author": {
        "@type": "Organization",
        "name": "Green Way Industries Technical Compliance Team",
        "url": "https://wasteoil.in/"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Green Way Industries",
        "logo": {
          "@type": "ImageObject",
          "url": "https://wasteoil.in/img/logo/logo.png"
        }
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://wasteoil.in/cpcb-epr-used-oil-compliance#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://wasteoil.in/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Blog",
          "item": "https://wasteoil.in/blog"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "CPCB EPR Used Oil Guide",
          "item": "https://wasteoil.in/cpcb-epr-used-oil-compliance"
        }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://wasteoil.in/cpcb-epr-used-oil-compliance#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Who is obligated under the CPCB EPR Used Oil Guidelines?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Obligated entities include Producers (manufacturers of base oil or virgin lubrication oil), Importers of base oil or finished lubricants, and Bulk Consumers (factories, logistics fleets, mining, and power plants generating more than 5,000 liters/year of used oil)."
          }
        },
        {
          "@type": "Question",
          "name": "What is the penalty for non-compliance with Used Oil EPR targets?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "CPCB and SPCBs levy Environmental Compensation (EC) per metric ton on unmet targets, issue show-cause notices under the Environment (Protection) Act, and can halt manufacturing operations or suspend factory consent to operate (CTO)."
          }
        },
        {
          "@type": "Question",
          "name": "How are EPR certificates generated and traded in India?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Registered recyclers (like Green Way Industries) convert verified quantities of collected used oil into re-refined base oil (RRBO), generating digital EPR certificates on the CPCB portal. Producers and bulk consumers purchase and retire these certificates to offset statutory annual recycling quotas."
          }
        },
        {
          "@type": "Question",
          "name": "Does handing over used oil to Green Way Industries satisfy my EPR bulk consumer liability?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Handing over spent oil to Green Way Industries provides formal statutory Form 10 manifests, verified GST invoices, weighbridge receipts, and direct CPCB portal upload records required for zero-liability audit clearance."
          }
        }
      ]
    }
  ]
}
JSON
,
    'form-10-hazardous-waste-manifest-rules' => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "@id": "https://wasteoil.in/form-10-hazardous-waste-manifest-rules#article",
      "isPartOf": {
        "@type": "WebPage",
        "@id": "https://wasteoil.in/form-10-hazardous-waste-manifest-rules"
      },
      "headline": "Form 10 Hazardous Waste Manifest: 7-Copy Rules, Procedure & Statutory Compliance Guide for Indian Factories",
      "description": "Comprehensive guide to the 7-copy Form 10 Hazardous Waste Manifest under Rule 19 of the Hazardous Wastes Rules 2016. Learn distribution flows, 30-day blue copy tracking, SPCB filings, and audit readiness.",
      "image": "https://wasteoil.in/img/logo/logo.png",
      "datePublished": "2026-10-20T08:00:00+05:30",
      "dateModified": "2026-10-20T08:00:00+05:30",
      "mainEntityOfPage": "https://wasteoil.in/form-10-hazardous-waste-manifest-rules",
      "author": {
        "@type": "Organization",
        "name": "Green Way Industries Technical Compliance Team",
        "url": "https://wasteoil.in/"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Green Way Industries",
        "logo": {
          "@type": "ImageObject",
          "url": "https://wasteoil.in/img/logo/logo.png"
        }
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://wasteoil.in/form-10-hazardous-waste-manifest-rules#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://wasteoil.in/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Blog",
          "item": "https://wasteoil.in/blog"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Form 10 Hazardous Waste Manifest Guide",
          "item": "https://wasteoil.in/form-10-hazardous-waste-manifest-rules"
        }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://wasteoil.in/form-10-hazardous-waste-manifest-rules#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is Form 10 in hazardous waste management?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Form 10 is a legally binding 7-copy tracking document mandated under Rule 19 of the Hazardous and Other Wastes (Management and Transboundary Movement) Rules, 2016. It records the complete cradle-to-grave transfer of hazardous waste from the generator to the authorized transporter and actual-user recycler."
          }
        },
        {
          "@type": "Question",
          "name": "What are the 7 colors of the Form 10 Manifest and who keeps them?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The 7 copies are: Copy 1 (White) submitted to the sender's SPCB/TNPCB; Copy 2 (Yellow) retained by the sender; Copy 3 (Pink) retained by the receiver/recycler; Copy 4 (Orange) retained by the transporter; Copy 5 (Green) submitted by the receiver to their SPCB; Copy 6 (Blue) mailed back to the sender after receipt; and Copy 7 (Grey) sent to destination SPCB for inter-state movements."
          }
        },
        {
          "@type": "Question",
          "name": "What happens if a factory does not receive the Blue Copy within 30 days?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Under Rule 19(2), if the sender (factory) does not receive the signed Copy 6 (Blue) from the recycler within 30 days of dispatch, the factory is legally mandated to immediately report the non-receipt to the State Pollution Control Board (TNPCB/SPCB). Failure to do so makes the factory liable for illegal disposal."
          }
        },
        {
          "@type": "Question",
          "name": "How long must factories preserve Form 10 manifests for environmental audits?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Factories and waste generators must maintain physical and digital copies of all Form 10 manifests (especially matching Yellow and Blue copies), alongside Form 3 registers, for a minimum period of 3 to 5 years."
          }
        },
        {
          "@type": "Question",
          "name": "Can waste oil be transported without a Form 10 manifest?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. Transporting waste oil, spent solvent, or hazardous chemical waste without a Form 10 manifest is an illegal offense under the Environment (Protection) Act, 1986, resulting in vehicle confiscation, steep Environmental Compensation penalties, and revocation of the factory's Consent to Operate (CTO)."
          }
        }
      ]
    }
  ]
}
JSON
,
    'transformer-oil-recycling-testing-standards' => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "@id": "https://wasteoil.in/transformer-oil-recycling-testing-standards#article",
      "isPartOf": {
        "@type": "WebPage",
        "@id": "https://wasteoil.in/transformer-oil-recycling-testing-standards"
      },
      "headline": "Used Transformer Oil Recycling: IS 1866 Testing, Dielectric Breakdown Voltage (BDV) & Regeneration Standards",
      "description": "Comprehensive engineering guide to insulating mineral transformer oil recycling, vacuum regeneration, IS 1866 testing parameters, dielectric breakdown voltage restoration, and TNPCB disposal compliance.",
      "image": "https://wasteoil.in/img/logo/logo.png",
      "datePublished": "2026-10-20T08:00:00+05:30",
      "dateModified": "2026-10-20T08:00:00+05:30",
      "mainEntityOfPage": "https://wasteoil.in/transformer-oil-recycling-testing-standards",
      "author": {
        "@type": "Organization",
        "name": "Green Way Industries Engineering & Compliance Team",
        "url": "https://wasteoil.in/"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Green Way Industries",
        "logo": {
          "@type": "ImageObject",
          "url": "https://wasteoil.in/img/logo/logo.png"
        }
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://wasteoil.in/transformer-oil-recycling-testing-standards#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://wasteoil.in/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Blog",
          "item": "https://wasteoil.in/blog"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Transformer Oil Recycling & IS 1866 Guide",
          "item": "https://wasteoil.in/transformer-oil-recycling-testing-standards"
        }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://wasteoil.in/transformer-oil-recycling-testing-standards#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is the minimum acceptable Breakdown Voltage (BDV) for transformer oil under IS 1866?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Under IS 1866, the minimum acceptable BDV for in-service transformer oil depends on the equipment voltage class: for transformers up to 72.5 kV, BDV should be ≥ 30 kV; for 72.5 kV to 145 kV, BDV should be ≥ 40 kV; and for transformers above 145 kV, BDV should be ≥ 50 kV. Recycled or reconditioned oil before refilling is typically restored to ≥ 60 kV."
          }
        },
        {
          "@type": "Question",
          "name": "Can degraded transformer oil be reconditioned or must it be disposed of?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "If degradation is due to moisture, dissolved gases, and particulate carbon, the oil can be reconditioned via high-vacuum dehydration and micron filtration. However, if severe chemical oxidation has elevated total acidity above 0.5 mg KOH/g or caused sludge precipitation, the oil must be collected by an authorized recycler (like Green Way Industries) for complete re-refining under CPCB EPR rules."
          }
        },
        {
          "@type": "Question",
          "name": "What is the permissible PCB (Polychlorinated Biphenyls) limit in recycled transformer oil?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Under Ministry of Environment, Forest and Climate Change (MoEF&CC) rules and the Stockholm Convention, transformer oil containing PCBs above 50 ppm (mg/kg) is classified as PCB-contaminated hazardous waste and cannot be recycled for general reuse. It must undergo specialized high-temperature destruction."
          }
        },
        {
          "@type": "Question",
          "name": "What causes the dielectric strength of transformer oil to drop?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The primary causes of BDV decline are moisture ingress from atmospheric humidity or paper insulation degradation, suspended carbon particles from internal micro-arcing, dissolved combustible gases, and polar oxidation byproducts like peroxides and organic acids."
          }
        },
        {
          "@type": "Question",
          "name": "Does recycling transformer oil generate CPCB EPR certificates?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Used transformer oil is categorized as hazardous used oil under Schedule I (Category 5.1). Handing over spent transformer oil to Green Way Industries generates official CPCB EPR certificates, validates Form 10 manifests, and fulfills statutory audit compliance."
          }
        }
      ]
    }
  ]
}
JSON
,
    'tnpcb-hazardous-waste-compliance-checklist' => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "@id": "https://wasteoil.in/tnpcb-hazardous-waste-compliance-checklist#article",
      "isPartOf": {
        "@type": "WebPage",
        "@id": "https://wasteoil.in/tnpcb-hazardous-waste-compliance-checklist"
      },
      "headline": "TNPCB Hazardous Waste Factory Audit Checklist: Consent to Operate (CTO) & 90-Day Storage Compliance in Tamil Nadu",
      "description": "Comprehensive compliance guide and inspection checklist for industrial manufacturing plants under the Tamil Nadu Pollution Control Board (TNPCB). Covers 90-day storage shed engineering, Form 3 registers, Form 4 annual returns, and Consent to Operate (CTO) renewals.",
      "image": "https://wasteoil.in/img/logo/logo.png",
      "datePublished": "2026-10-20T08:00:00+05:30",
      "dateModified": "2026-10-20T08:00:00+05:30",
      "mainEntityOfPage": "https://wasteoil.in/tnpcb-hazardous-waste-compliance-checklist",
      "author": {
        "@type": "Organization",
        "name": "Green Way Industries Environmental Audit Team",
        "url": "https://wasteoil.in/"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Green Way Industries",
        "logo": {
          "@type": "ImageObject",
          "url": "https://wasteoil.in/img/logo/logo.png"
        }
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://wasteoil.in/tnpcb-hazardous-waste-compliance-checklist#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://wasteoil.in/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Blog",
          "item": "https://wasteoil.in/blog"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "TNPCB Factory Audit Checklist",
          "item": "https://wasteoil.in/tnpcb-hazardous-waste-compliance-checklist"
        }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://wasteoil.in/tnpcb-hazardous-waste-compliance-checklist#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is the 90-day hazardous waste storage rule under TNPCB regulations?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Under Rule 8 of the Hazardous and Other Wastes Rules, an industrial occupier is legally permitted to store hazardous waste on-site for a maximum of 90 days. Before this period expires, the accumulated waste must be manifested and transferred to an authorized actual-user recycler or TSDF."
          }
        },
        {
          "@type": "Question",
          "name": "What is the difference between Form 3 and Form 4 under hazardous waste rules?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Form 3 is an on-site, day-to-day register tracking daily generation, storage, and disposal of hazardous waste, which must be presented during unannounced TNPCB inspections. Form 4 is the annual compliance return compiled from Form 3 and Form 10 manifests, which must be submitted to TNPCB on or before June 30th of every year."
          }
        },
        {
          "@type": "Question",
          "name": "What secondary containment specifications are required for hazardous waste sheds?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The storage shed must feature an impervious concrete floor with epoxy/acid-resistant coating, surrounded by a containment bund wall engineered to hold at least 110% volume of the largest drum or container stored, alongside dedicated spill kits and no rainwater drainage connection."
          }
        },
        {
          "@type": "Question",
          "name": "Can an industry renew its Consent to Operate (CTO) without a valid hazardous waste recycler agreement?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. TNPCB mandates a live, authenticated off-take agreement with an authorized recycler or TSDF, along with copies of past Form 10 manifests and Form 4 annual returns, as mandatory prerequisites for renewing Consent to Operate (CTO) and Hazardous Waste Authorization."
          }
        },
        {
          "@type": "Question",
          "name": "What are the penalties for exceeding the 90-day storage limit in Tamil Nadu?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Exceeding the 90-day storage limit without written permission from TNPCB attracts daily Environmental Compensation fines under CPCB guidelines, issuance of show-cause notices under Section 33A of the Water Act and Section 31A of the Air Act, and potential disconnection of factory electricity and water supplies."
          }
        }
      ]
    }
  ]
}
JSON
];
