<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import {
    Heart,
    Download,
    Mail,
    ExternalLink,
    CheckCircle,
    AlertTriangle,
    Menu,
    X,
} from 'lucide-vue-next';
import { ref, computed } from 'vue';
import ContactController from '@/actions/App/Http/Controllers/ContactController';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardHeader,
    CardTitle,
    CardDescription,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

withDefaults(
    defineProps<{
        canRegister?: boolean;
    }>(),
    {
        canRegister: true,
    },
);

const contactForm = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
});

const submitContact = () => {
    contactForm.post(ContactController.store.url(), {
        preserveScroll: true,
        onSuccess: () => contactForm.reset(),
    });
};

const currentYear = new Date().getFullYear();
const mobileNavOpen = ref(false);

const skills = [
    { name: 'Vue.js' },
    { name: 'TypeScript' },
    { name: 'JavaScript' },
    { name: 'PHP' },
    { name: 'Node.js' },
    { name: 'ASP.NET / C#' },
    { name: 'SQL Server / MySQL' },
    { name: 'Laravel' },
    { name: 'REST APIs' },
    { name: 'Git' },
    { name: 'UI/UX' },
    { name: 'Workflow Automation' },
    { name: 'Full Stack Development' },
    { name: 'Agile Development' },
    { name: 'AI Assisted Engineering' },
    { name: 'Microsoft Azure' },
];

const projects = [
    {
        title: 'Field Safety Supervisor',
        company: 'Durham School Services',
        description:
            `<p class="mb-4">Durham School Services is a national student transportation provider delivering safe, reliable school bus services to school
districts across the United States. The Everett, Washington location employs approximately 170 staff and operates 140 routes,
supporting daily transportation operations, driver training, fleet maintenance, safety, and coordination with the school district.</p>`,
        keyContributions: [
            'Managed license, medical, and safety-certification compliance for approximately 160 drivers, using renewal tracking and advance reminders to keep requirements visible.',
            'Replaced paper incident reporting with an online workflow built in Power Automate, cutting report-routing time from about one week to a few minutes.',
            'Reworked CDL training paperwork and processes, reducing the training timeline from three months to two months.',
            'Maintained a reported 100% CDL exam pass rate while coordinating candidate paperwork and state clearance requirements.',
            'Replaced time-consuming physical video retrieval with an online lookup process.',
        ],
        technologies: [
            'Laravel',
            'Vue.js',
            'PHP',
            'JavaScript',
            'Power Automate',
            'Workflow Automation',
            'AI Assisted Development',
            'Full Stack Engineering',
        ],
    },
    {
        title: 'Senior Web Application Developer',
        company: 'Davis Wright Tremaine',
        description:
            `<p class="mb-4">Davis Wright Tremaine is a national law firm headquartered in Seattle, Washington, with more than 600 attorneys nationwide.
The firm provides legal services to businesses and organizations across areas including litigation, corporate law, employment,
intellectual property, and technology.</p>`,
        keyContributions: [
            'Built .NET applications with SQL Server, ASP.NET, and .NET Core that gave legal teams centralized access to client and project information.',
            'Introduced Vue.js into the firm\'s application work, earning leadership support for a modern framework for interactive internal tools.',
            'Developed request, work-allocation, and approval workflows that helped lawyers and paralegals assign work, coordinate reviews, and track handoffs.',
            'Implemented tablet-based conference-room scheduling so employees could check availability and book rooms on site or in advance.',
            'Automated email-triggered tasks with Power Automate and contributed to a nine-office directory, reducing friction in routine coordination and colleague lookup.',
        ],
        technologies: [
            'Node.js',
            'ASP.NET',
            'C#',
            'SQL Server',
            'Vue.js',
            'TypeScript',
            'REST APIs',
            'Git',
        ],
    },
    {
        title: 'Senior Application Developer',
        company: 'Brayton Purcell',
        description:
            `<p class="mb-4">Brayton Purcell is a law firm headquartered in Novato, California, specializing in asbestos, toxic exposure, personal injury, and
wrongful death litigation. The firm represents clients nationwide and has more than 40 attorneys supported by over 200 staff
members, including dedicated investigative and research teams.</p>`,
        keyContributions: [
            'Automated claims submissions with Selenium against legacy insurer websites, replacing repetitive manual data entry where APIs were unavailable.',
            'Rebuilt stalled applications with Vue.js and modernized legacy tools, returning neglected systems to service and improving maintainability.',
            'Digitized paper-heavy, department-specific workflows to make information easier to access and share across previously siloed teams.',
            'Turned an internal archive of ship-service records into an online data product that other law firms could purchase access to.',
        ],
        technologies: [
            'ASP.NET',
            'C#',
            'SQL Server',
            'Vue.js',
            'TypeScript',
            'Git',
        ],
    },
    {
        title: 'Frontend Application Developer',
        company: 'The Clorox Company',
        description:
            `<p class="mb-4">The Clorox Company's marketing department in Oakland, California, develops and manages marketing strategies for well-known
consumer brands such as Fresh Step, Hidden Valley, and Glad.</p>`,
        keyContributions: [
            'Built campaign landing pages and microsites for Fresh Step, Hidden Valley Ranch, and GLAD, supporting multiple national consumer brands.',
            'Contributed to Fresh Step\'s Paw Points loyalty experience, enabling customers to earn and redeem rewards or donate points to animal rescues.',
        ],
        technologies: [
            'PHP',
            'JavaScript',
            'MySQL',
            'Bootstrap',
            'jQuery',
            'Responsive Design',
            'UI/UX',
        ],
    },
    {
        title: 'Senior Programming Analyst',
        company: 'County of Sonoma',
        description:
            `<p class="mb-4">Sonoma County is a county located in the northern part of California's San Francisco Bay Area. The county government provides
a wide range of services to residents, including public safety, health and social services, infrastructure maintenance, and
community development.</p>`,
        keyContributions: [
            'Built an Angular public search tool with map and address lookup, helping residents find restaurant health inspections and safety records.',
            'Delivered the contract application in about three months—half the planned schedule—and it remained in use after completion.',
        ],
        technologies: [
            'ASP.NET',
            'C#',
            'SQL Server',
            'Vue.js',
            'System Integration',
            'Data Analysis',
        ],
    },
    {
        title: 'Frontend Application Developer',
        company: 'Littler Mendelson',
        description:
            `<p class="mb-4">Littler Mendelson is a law firm headquartered in San Francisco, California, specializing in labor and employment law. The firm
provides legal services to employers across various industries, helping them navigate complex employment regulations and
workplace issues.</p>`,
        keyContributions: [
            'Built interactive reporting and workflow tools helping lawyers filter records and track project status.',
            'Optimized SQL stored procedures, reducing some report processes from several minutes to under 15 seconds.',
            'Replaced image-based reports with selectable, shareable web visualizations that preserved filters and made findings easier to review and reuse.',
        ],
        technologies: [
            'ASP.NET',
            'Vue.js',
            'TypeScript',
            'SQL Server',
            'Responsive Design',
            'Git',
        ],
    },
    {
        title: 'Web Developer',
        company: 'Innovative Interfaces, Inc.',
        description:
            `<p class="mb-4">Innovative Interfaces is a company that provides integrated library system (ILS) software and services to libraries. Their solutions
help libraries manage their collections, streamline operations, and enhance the user experience for patrons.</p>`,
        keyContributions: [
            'Maintained the company-wide SharePoint intranet and built department tools, helping staff document processes and find information for daily work.',
            'Contributed to a library-software review system that let customers submit structured product feedback.',
        ],
        technologies: [
            'PHP',
            'JavaScript',
            'MySQL',
            'API Integration',
            'Bootstrap',
            'Git',
        ],
    },
];

const donationAmounts = [5, 10, 25, 50, 100];
const selectedDonation = ref<number | null>(25);
const customDonation = ref<string | number>('');

const normalizedCustomDonation = computed(() => String(customDonation.value ?? '').trim());
const hasCustomDonation = computed(() => normalizedCustomDonation.value !== '');
const parsedCustomDonation = computed(() => Number.parseFloat(normalizedCustomDonation.value));

const donationValue = computed(() => {
    if (hasCustomDonation.value) {
        return Number.isFinite(parsedCustomDonation.value)
            ? parsedCustomDonation.value
            : 0;
    }

    return selectedDonation.value ?? 0;
});

const hasValidCustomDonation = computed(() => {
    if (!hasCustomDonation.value) {
        return false;
    }

    return Number.isFinite(parsedCustomDonation.value)
        && parsedCustomDonation.value > 0;
});

const canDonate = computed(() => {
    if (hasCustomDonation.value) {
        return Number.isFinite(parsedCustomDonation.value)
            && parsedCustomDonation.value > 0;
    }

    return (selectedDonation.value ?? 0) > 0;
});

const selectDonation = (amount: number) => {
    selectedDonation.value = amount;
    customDonation.value = '';
};
</script>

<template>
    <Head title="The Ryan Beard Foundation — Dedicated to Keeping Great Software in Production">
        <link rel="stylesheet" href="https://use.typekit.net/mjq6yxd.css" />
        <meta
            name="description"
            content="The Ryan Beard Foundation exists to support one critical mission: ensuring that Ryan Beard continues building practical software that solves real operational problems."
        />
    </Head>

    <div class="min-h-screen bg-[#F2F2F2] font-sans text-[#3C3C40]">
        <!-- Navigation -->
        <nav
            class="sticky top-0 z-50 border-b border-[#BFB6AE]/50 bg-[#F2F2F2]/95 backdrop-blur-sm"
        >
            <div
                class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4"
            >
                <div class="flex items-center gap-3">
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-[#6593A6] text-[#F2F2F2]"
                    >
                        <Heart class="h-4 w-4 fill-current" />
                    </div>
                    <div class="leading-tight">
                        <span class="block text-lg font-bold tracking-tight"
                            >Ryan Beard Foundation</span
                        >
                    </div>
                </div>
                <div
                    class="hidden items-center gap-6 text-sm font-medium md:flex"
                >
                    <a
                        href="#mission"
                        class="text-[#3C3C40]/80 transition hover:text-[#D97236]"
                        >Our Mission</a
                    >
                    <a
                        href="#portfolio"
                        class="text-[#3C3C40]/80 transition hover:text-[#D97236]"
                        >Portfolio</a
                    >
                    <a
                        href="#contact"
                        class="text-[#3C3C40]/80 transition hover:text-[#D97236]"
                        >Contact</a
                    >
                    <a
                        href="/resume"
                        class="inline-flex items-center gap-1.5 rounded-full bg-[#6593A6] px-4 py-1.5 text-[#F2F2F2] transition hover:bg-[#D97236]"
                    >
                        <Download class="h-3.5 w-3.5" />
                        CV
                    </a>
                </div>

                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-[#3C3C40] transition hover:bg-[#BFB6AE]/30 md:hidden"
                    :aria-expanded="mobileNavOpen"
                    aria-controls="mobile-nav"
                    aria-label="Toggle navigation menu"
                    @click="mobileNavOpen = !mobileNavOpen"
                >
                    <X v-if="mobileNavOpen" class="h-5 w-5" />
                    <Menu v-else class="h-5 w-5" />
                </button>
            </div>

            <div
                v-if="mobileNavOpen"
                id="mobile-nav"
                class="border-t border-[#BFB6AE]/40 bg-[#F2F2F2] px-6 pb-4 pt-3 md:hidden"
            >
                <div class="flex flex-col items-end gap-2 text-sm font-medium">
                    <a
                        href="#mission"
                        class="rounded-md px-2 py-2 text-right text-[#3C3C40]/85 transition hover:bg-[#BFB6AE]/20 hover:text-[#D97236]"
                        @click="mobileNavOpen = false"
                        >Our Mission</a
                    >
                    <a
                        href="#portfolio"
                        class="rounded-md px-2 py-2 text-right text-[#3C3C40]/85 transition hover:bg-[#BFB6AE]/20 hover:text-[#D97236]"
                        @click="mobileNavOpen = false"
                        >Portfolio</a
                    >
                    <a
                        href="#contact"
                        class="rounded-md px-2 py-2 text-right text-[#3C3C40]/85 transition hover:bg-[#BFB6AE]/20 hover:text-[#D97236]"
                        @click="mobileNavOpen = false"
                        >Contact</a
                    >
                    <a
                        href="/resume"
                        class="mt-1 inline-flex items-center justify-center gap-1.5 rounded-full bg-[#6593A6] px-4 py-2 text-[#F2F2F2] transition hover:bg-[#D97236]"
                        @click="mobileNavOpen = false"
                    >
                        <Download class="h-3.5 w-3.5" />
                        CV
                    </a>
                </div>
            </div>
        </nav>

        <!-- Hero -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-[#F2F2F2] via-[#FFFFFF] to-[#BFB6AE]/40 py-24"
        >
            <div
                class="absolute inset-0 opacity-5"
                style="
                    background-image: radial-gradient(
                        circle at 1px 1px,
                        #BFB6AE 1px,
                        transparent 0
                    );
                    background-size: 32px 32px;
                "
            ></div>
            <div class="relative mx-auto max-w-4xl px-6 text-center">
                <h1 class="mb-6 text-5xl font-extrabold tracking-tight lg:text-7xl">
                    Ryan Beard<br />
                    <span class="font-accent text-[#D97236]">Foundation</span>
                </h1>
                <p class="mx-auto mb-4 max-w-2xl text-xl text-[#3C3C40]/85">
                    Dedicated to one of the most worthy
                    challenges of our time,
                    <strong class="block"
                        >the full time employment of Ryan Beard.</strong
                    >
                </p>
                <p class="mx-auto mb-10 max-w-xl text-base italic text-[#3C3C40]/70">
                    "Nobody should have to suffer the indignity of Ryan being
                    between jobs. Together, we can end this."
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="/resume">
                        <Button
                            size="lg"
                            class="gap-2 bg-[#6593A6] text-[#F2F2F2] hover:bg-[#D97236]"
                        >
                            <Download class="h-4 w-4" />
                            Download Ryan's CV
                        </Button>
                    </a>
                    <a href="#donate">
                        <Button variant="outline" size="lg" class="gap-2">
                            <Heart class="h-4 w-4 fill-current" />
                            Donate to the Cause
                        </Button>
                    </a>
                </div>
                <p class="mt-6 text-xs text-[#3C3C40]/70">
                    All donations go directly towards coffee, ergonomic
                    keyboards, and Ryan's happiness.
                </p>
            </div>
        </section>

        <!-- Mission & Stats -->
        <section id="mission" class="py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-3xl font-bold">
                        Our Mission
                    </h2>
                    <p class="mx-auto max-w-2xl text-[#3C3C40]/80">
                        Ryan Beard Foundation is committed to advancing a 
                        bold and noble cause: Helping organizations modernize 
                        operations through thoughtfully designed software, 
                        user focused systems, and practical engineering 
                        solutions built by Ryan Beard.
                    </p>
                </div>

                <h2 class="mb-6 text-center text-3xl font-bold">
                    Why Organizations Hire Ryan Beard
                </h2>
                <div class="mb-16 grid gap-8 md:grid-cols-3">
                    <Card class="border-[#6593A6]/30 bg-white text-center">
                        <CardContent class="p-8">
                            <div class="font-semibold text-[#3C3C40]">
                                17+ Years of Experience
                            </div>
                            <div class="mt-1 text-sm text-[#3C3C40]/70">
                                Designing and delivering production software 
                                across legal, government, enterprise, 
                                operations, and internal tooling environments.
                            </div>
                        </CardContent>
                    </Card>
                    <Card class="border-[#6593A6]/30 bg-white text-center">
                        <CardContent class="p-8">
                            <div class="font-semibold text-[#3C3C40]">
                                Full Stack Engineering with Operational Awareness
                            </div>
                            <div class="mt-1 text-sm text-[#3C3C40]/70">
                                Ryan combines engineering and operational 
                                experience to build usable software that 
                                solves real workflow problems.
                            </div>
                        </CardContent>
                    </Card>
                    <Card class="border-[#6593A6]/30 bg-white text-center">
                        <CardContent class="p-8">
                            <div class="font-semibold text-[#3C3C40]">
                                Modern Development Approach
                            </div>
                            <div class="mt-1 text-sm text-[#3C3C40]/70">
                                Experienced in AI assisted development, 
                                rapid prototyping, workflow automation, 
                                and scalable full stack applications.
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <!-- Skills -->
                <div class="rounded-2xl border border-[#BFB6AE]/40 bg-white p-8">
                    <h3 class="mb-6 text-center text-xl font-bold">
                        Skills the Foundation is Proud of
                    </h3>
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        <div
                            v-for="skill in skills"
                            :key="skill.name"
                            class="flex min-h-[72px] items-center justify-center rounded-xl border border-[#BFB6AE]/35 bg-[#F2F2F2] p-4 text-center shadow-sm"
                        >
                            <div class="flex items-center justify-center font-semibold leading-snug">
                                {{ skill.name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section id="portfolio" class="bg-[#BFB6AE]/20 py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mb-12 text-center">
                    <h2 class="mb-4 text-3xl font-bold">
                        Evidence of Employability
                    </h2>
                    <p class="mx-auto max-w-2xl text-[#3C3C40]/80">
                        The Foundation presents the following body of work as
                        irrefutable proof that Ryan Beard deserves to be hired
                        immediately, generously, and with a good benefits
                        package.
                    </p>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <Card
                        v-for="project in projects"
                        :key="project.title"
                        class="group border border-[#BFB6AE]/40 bg-white transition-all duration-200 hover:shadow-lg"
                    >
                        <CardHeader>
                            <div class="mb-1 text-sm font-medium text-[#6593A6]">
                                {{ project.company }}
                            </div>
                            <div class="flex items-start justify-between">
                                <CardTitle class="text-lg text-[#3C3C40]">{{
                                    project.title
                                }}</CardTitle>
                            </div>
                        </CardHeader>
                        <CardContent>
                            <div class="mb-4 text-[#3C3C40]/80" v-html="project.description"></div>
                            <div class="flex mb-4 flex-wrap gap-2">
                                <h4 class="w-full text-sm font-semibold text-[#3C3C40]">Key Contributions</h4>
                                <ul>
                                    <li
                                        v-for="(contribution) in project.keyContributions"
                                        class="list-inside list-disc text-[#3C3C40]/80"
                                    >
                                        {{ contribution }}
                                    </li>
                                </ul>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <Badge
                                    v-for="tag in project.technologies"
                                    :key="tag"
                                    variant="secondary"
                                    class="text-xs !bg-[#3C3C40] !text-[#F2F2F2]"
                                    >{{ tag }}</Badge
                                >
                            </div>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </section>

        <!-- Donate -->
        <section id="donate" class="py-20">
            <div class="mx-auto max-w-3xl px-6 text-center">
                <h2 class="mb-4 text-3xl font-bold">
                    Support the Foundation
                </h2>
                <p class="mb-2 text-[#3C3C40]/80">
                    Every dollar donated goes directly to the Ryan Beard
                    Employment Fund. Your generosity could mean the difference
                    between Ryan writing excellent code or Ryan learning to make
                    sourdough bread. <strong>Do not let that happen.</strong>
                </p>
                <p class="mb-10 text-sm italic text-[#3C3C40]/70">
                    (In all seriousness, if you'd like to hire Ryan, the Contact
                    section below is your first step.)
                </p>

                <div
                    class="rounded-2xl border border-[#BFB6AE]/45 bg-white p-8 shadow-sm"
                >
                    <h3 class="mb-6 text-lg font-semibold">
                        Choose a Donation Amount
                    </h3>
                    <div class="mb-4 flex flex-wrap justify-center gap-3">
                        <button
                            v-for="amount in donationAmounts"
                            :key="amount"
                            @click="selectDonation(amount)"
                            class="rounded-full border px-5 py-2 text-sm font-semibold transition-all"
                            :class="
                                selectedDonation === amount && !hasCustomDonation
                                    ? 'border-[#6593A6] bg-[#6593A6] text-[#F2F2F2]'
                                    : 'border-[#BFB6AE]/55 bg-[#F2F2F2] text-[#3C3C40] hover:border-[#D97236]'
                            "
                        >
                            ${{ amount }}
                        </button>
                        <div
                            class="flex items-center gap-1 rounded-full border px-4 py-1.5 transition-all"
                            :class="
                                hasValidCustomDonation
                                    ? 'border-[#6593A6] bg-[#6593A6] text-[#F2F2F2]'
                                    : 'border-[#BFB6AE]/55 bg-[#F2F2F2]'
                            "
                        >
                            <span
                                class="text-sm font-semibold"
                                :class="hasValidCustomDonation ? 'text-[#F2F2F2]' : 'text-[#3C3C40]/70'"
                                >$</span
                            >
                            <input
                                v-model="customDonation"
                                @input="selectedDonation = null"
                                @focus="selectedDonation = null"
                                type="number"
                                step="0.01"
                                placeholder="Other"
                                class="w-16 bg-transparent text-sm outline-none [appearance:textfield] [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                :class="
                                    hasValidCustomDonation
                                        ? 'text-[#F2F2F2] placeholder:text-[#F2F2F2]/70'
                                        : 'text-[#3C3C40] placeholder:text-[#3C3C40]/50'
                                "
                            />
                        </div>
                    </div>

                    <div
                        v-if="hasCustomDonation && !hasValidCustomDonation"
                        class="mb-6 flex items-start gap-3 rounded-xl border border-[#D92D20]/45 bg-[#D92D20]/10 p-4 text-left text-[#7A271A]"
                    >
                        <AlertTriangle class="mt-0.5 h-5 w-5 flex-shrink-0" />
                        <p>Please enter a donation amount greater than $0. The Foundation cannot accept anti-donations.</p>
                    </div>

                    <a
                        :href="`https://www.paypal.com/donate/?business=VG7E9Q8X29UZS&amount=${donationValue}&no_recurring=0&currency_code=USD`"
                        target="_blank"
                        rel="noopener noreferrer"
                        :aria-disabled="!canDonate"
                        :class="{ 'pointer-events-none opacity-60': !canDonate }"
                    >
                        <Button
                            size="lg"
                            :disabled="!canDonate"
                            class="gap-2 bg-[#6593A6] text-[#F2F2F2] hover:bg-[#D97236]"
                        >
                            <Heart class="h-4 w-4 fill-current" />
                            Donate ${{ canDonate ? donationValue : '...' }}
                        </Button>
                    </a>

                    <p class="mt-4 text-xs text-[#3C3C40]/70">
                        Secure payments via PayPal. The Foundation is entirely
                        fictional but the talent is very real.
                    </p>
                </div>
            </div>
        </section>

        <!-- Share the Cause -->
        <section id="share" class="bg-[#6593A6]/15 py-20">
            <div class="mx-auto max-w-4xl px-6 text-center">
                <h2 class="mb-4 text-3xl font-bold">
                    Share the Cause
                </h2>
                <p class="mx-auto mb-3 max-w-2xl text-[#3C3C40]/85">
                    Not ready to hire Ryan yet? You can still support the mission 
                    by informing the internet that practical, operationally minded 
                    software engineers are still extremely valuable.
                </p>
                <p class="mx-auto mb-10 max-w-2xl text-sm italic text-[#3C3C40]/70">
                    Think of it as activism, but with less marching and more
                    clicking.
                </p>

                <div class="grid gap-4 sm:grid-cols-3">
                    <a
                        href="https://x.com/intent/tweet?text=I%20support%20the%20Ryan%20Beard%20Foundation.%20Help%20keep%20a%20great%20developer%20employed!&url=https%3A%2F%2Fryanbeard.foundation"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="rounded-2xl border border-[#BFB6AE]/45 bg-white p-5 text-left transition hover:-translate-y-0.5 hover:shadow-md"
                    >
                        <div class="mb-1 font-semibold">
                            Share on X
                        </div>
                        <p class="text-sm text-[#3C3C40]/80">
                            Spread awareness about workflow modernization and gainful employment.
                        </p>
                        <span class="mt-3 inline-flex items-center gap-1 text-sm font-medium text-[#6593A6]">
                            Launch post
                            <ExternalLink class="h-4 w-4" />
                        </span>
                    </a>

                    <a
                        href="https://www.linkedin.com/sharing/share-offsite/?url=https%3A%2F%2Fryanbeard.foundation"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="rounded-2xl border border-[#BFB6AE]/45 bg-white p-5 text-left transition hover:-translate-y-0.5 hover:shadow-md"
                    >
                        <div class="mb-1 font-semibold">
                            Share on LinkedIn
                        </div>
                        <p class="text-sm text-[#3C3C40]/80">
                            Help recruiters discover someone who ships real solutions, not just Jira tickets.
                        </p>
                        <span class="mt-3 inline-flex items-center gap-1 text-sm font-medium text-[#6593A6]">
                            Share professionally
                            <ExternalLink class="h-4 w-4" />
                        </span>
                    </a>

                    <a
                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fryanbeard.foundation"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="rounded-2xl border border-[#BFB6AE]/45 bg-white p-5 text-left transition hover:-translate-y-0.5 hover:shadow-md"
                    >
                        <div class="mb-1 font-semibold">
                            Share on Facebook
                        </div>
                        <p class="text-sm text-[#3C3C40]/80">
                            Even your opinionated uncle deserves better internal software systems.
                        </p>
                        <span class="mt-3 inline-flex items-center gap-1 text-sm font-medium text-[#6593A6]">
                            Spread the news
                            <ExternalLink class="h-4 w-4" />
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="bg-[#BFB6AE]/20 py-20">
            <div class="mx-auto max-w-3xl px-6">
                <div class="mb-12 text-center">
                    <h2 class="mb-4 text-3xl font-bold">
                        Get in Touch
                    </h2>
                    <p class="text-[#3C3C40]/80">
                        Are you a potential employer, a collaborator, or simply
                        a concerned citizen who wants to ensure Ryan remains
                        employed? Fill in the form below and the Foundation will
                        respond promptly.
                    </p>
                </div>

                <!-- Success message -->
                <div
                    v-if="contactForm.recentlySuccessful"
                    class="mb-6 flex items-start gap-3 rounded-xl border border-[#6593A6]/55 bg-[#6593A6]/15 p-4 text-[#3C3C40]"
                >
                    <CheckCircle class="mt-0.5 h-5 w-5 flex-shrink-0" />
                    <p>
                        Thank you. Your message was sent successfully and  will
                        get back to you shortly.
                    </p>
                </div>

                <Card class="border border-[#BFB6AE]/45 bg-white shadow-sm">
                    <CardContent class="p-8">
                        <form @submit.prevent="submitContact" class="space-y-6">
                            <div class="grid gap-6 sm:grid-cols-2">
                                <div class="grid gap-2">
                                    <Label for="contact-name" class="text-[#3C3C40]"
                                        >Your Name</Label
                                    >
                                    <Input
                                        id="contact-name"
                                        v-model="contactForm.name"
                                        name="name"
                                        placeholder="Jane Smith"
                                        required
                                        class="!border-[#BFB6AE]/70 !bg-[#F2F2F2] !text-[#3C3C40] placeholder:!text-[#3C3C40]/50 focus-visible:!ring-2 focus-visible:!ring-[#6593A6]/40"
                                        :class="{
                                            '!border-[#D97236] focus-visible:!ring-[#D97236]/30':
                                                contactForm.errors.name,
                                        }"
                                    />
                                    <p
                                        v-if="contactForm.errors.name"
                                        class="text-sm text-[#D97236]"
                                    >
                                        {{ contactForm.errors.name }}
                                    </p>
                                </div>
                                <div class="grid gap-2">
                                    <Label for="contact-email"
                                        class="text-[#3C3C40]"
                                        >Email Address</Label
                                    >
                                    <Input
                                        id="contact-email"
                                        v-model="contactForm.email"
                                        name="email"
                                        type="email"
                                        placeholder="jane@company.com"
                                        required
                                        class="!border-[#BFB6AE]/70 !bg-[#F2F2F2] !text-[#3C3C40] placeholder:!text-[#3C3C40]/50 focus-visible:!ring-2 focus-visible:!ring-[#6593A6]/40"
                                        :class="{
                                            '!border-[#D97236] focus-visible:!ring-[#D97236]/30':
                                                contactForm.errors.email,
                                        }"
                                    />
                                    <p
                                        v-if="contactForm.errors.email"
                                        class="text-sm text-[#D97236]"
                                    >
                                        {{ contactForm.errors.email }}
                                    </p>
                                </div>
                            </div>

                            <div class="grid gap-2">
                                <Label for="contact-subject" class="text-[#3C3C40]"
                                    >Subject</Label
                                >
                                <Input
                                    id="contact-subject"
                                    v-model="contactForm.subject"
                                    name="subject"
                                    placeholder="e.g. We would like to hire Ryan immediately"
                                    required
                                    class="!border-[#BFB6AE]/70 !bg-[#F2F2F2] !text-[#3C3C40] placeholder:!text-[#3C3C40]/50 focus-visible:!ring-2 focus-visible:!ring-[#6593A6]/40"
                                    :class="{
                                        '!border-[#D97236] focus-visible:!ring-[#D97236]/30':
                                            contactForm.errors.subject,
                                    }"
                                />
                                <p
                                    v-if="contactForm.errors.subject"
                                    class="text-sm text-[#D97236]"
                                >
                                    {{ contactForm.errors.subject }}
                                </p>
                            </div>

                            <div class="grid gap-2">
                                <Label for="contact-message" class="text-[#3C3C40]"
                                    >Message</Label
                                >
                                <textarea
                                    id="contact-message"
                                    v-model="contactForm.message"
                                    name="message"
                                    rows="5"
                                    placeholder="Tell us why you want to employ Ryan, or just say hello..."
                                    required
                                    class="flex w-full rounded-md border border-[#BFB6AE]/70 bg-[#F2F2F2] px-3 py-2 text-sm text-[#3C3C40] ring-offset-background placeholder:text-[#3C3C40]/50 focus-visible:ring-2 focus-visible:ring-[#6593A6]/40 focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                                    :class="{
                                        'border-[#D97236] focus-visible:ring-[#D97236]/30':
                                            contactForm.errors.message,
                                    }"
                                ></textarea>
                                <p
                                    v-if="contactForm.errors.message"
                                    class="text-sm text-[#D97236]"
                                >
                                    {{ contactForm.errors.message }}
                                </p>
                            </div>

                            <Button
                                type="submit"
                                size="lg"
                                :disabled="contactForm.processing"
                                class="w-full gap-2 bg-[#6593A6] text-[#F2F2F2] hover:bg-[#D97236]"
                            >
                                <Mail class="h-4 w-4" />
                                {{
                                    contactForm.processing
                                        ? 'Sending...'
                                        : contactForm.wasSuccessful
                                          ? 'Message Sent'
                                          : 'Send Message'
                                }}
                            </Button>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </section>

        <!-- Resume Download -->
        <section class="py-16">
            <div class="mx-auto max-w-3xl px-6 text-center">
                <h2 class="mb-3 text-2xl font-bold">
                    Download Ryan's CV
                </h2>
                <p class="mb-8 text-[#3C3C40]/80">
                    All the evidence you need to make the right decision. Ryan's
                    full curriculum vitae, available for download in glorious
                    PDF format.
                </p>
                <a href="/resume">
                    <Button
                        size="lg"
                        class="gap-2 bg-[#6593A6] text-[#F2F2F2] hover:bg-[#D97236]"
                    >
                        <Download class="h-5 w-5" />
                        Download CV (PDF)
                    </Button>
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="border-t border-[#BFB6AE]/50 bg-[#6593A6]/15 py-10">
            <div class="mx-auto max-w-6xl px-6">
                <div
                    class="flex flex-col items-center justify-between gap-4 sm:flex-row"
                >
                    <div class="mx-auto flex flex-col items-center gap-1 text-sm text-[#3C3C40]/80 sm:flex-row sm:gap-2">
                        <Heart
                            class="h-4 w-4 fill-current text-[#D97236] sm:h-3.5 sm:w-3.5"
                        />
                        <span class="text-center sm:text-left"
                            >© {{ currentYear }} The Ryan Beard
                            Foundation. All rights reserved.</span
                        >
                    </div>
                </div>
                <p class="mt-4 text-center text-xs text-[#3C3C40]/70">
                    The Ryan Beard Foundation is a satirical personal portfolio
                    website. Any resemblance to an actual charity is entirely
                    intentional.
                </p>
            </div>
        </footer>
    </div>
</template>

<style>
html {
    scroll-behavior: smooth;
}
</style>
