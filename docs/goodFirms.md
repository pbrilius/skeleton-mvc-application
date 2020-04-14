# Interview

Short WhatsApp interview, considering position in their firm.

## Questions

1. You get a call from your project manager at 6 a.m.
saying your web application is having intermittent access
problems by the user community. At first glance, it
sounds like an issue with one of the VMs on the load
balancer managed by the network team. How do you
proceed?

Connect - SSH - to the non working VM owning - hosting - cluster (be it Kubernetes or AWS EC2s) and restart non working VM. If the problem persists (e. g. the VM stops working after several or 10+ minutes) then purge its containers and reboot it downloading from cacheless state. If the problem still persists, then call developer team to analyze and investigate (R&D) source code hosted on that VM, based on load data, because it may have problems handling big capacity of data processing assigned to it by the users quantity.